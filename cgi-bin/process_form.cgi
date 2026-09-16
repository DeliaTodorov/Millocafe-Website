#!C:/xampp/perl/bin/perl.exe

use strict;
use warnings;
use utf8;

binmode STDOUT, ':encoding(UTF-8)';

sub decode_url {
    my ($value) = @_;
    $value = '' unless defined $value;
    $value =~ tr/+/ /;
    $value =~ s/%([0-9A-Fa-f]{2})/chr(hex($1))/eg;
    return clean($value);
}

sub clean {
    my ($value) = @_;
    $value = '' unless defined $value;
    $value =~ s/^
+|
+$//g;
    $value =~ s/^
+|
+$//g;
    $value =~ s/^\s+|\s+$//g;
    $value =~ s/\r\n|\r/\n/g;
    return $value;
}

sub parse_form {
    my $method = $ENV{'REQUEST_METHOD'} || 'GET';
    my $raw = '';

    if ($method eq 'POST') {
        read(STDIN, $raw, $ENV{'CONTENT_LENGTH'} || 0);
    } else {
        $raw = $ENV{'QUERY_STRING'} || '';
    }

    my %form;
    my $content_type = $ENV{'CONTENT_TYPE'} || '';

    # Varianta normală pentru AJAX: application/x-www-form-urlencoded
    if ($content_type !~ /multipart\/form-data/i) {
        for my $pair (split /&/, $raw) {
            next if $pair eq '';
            my ($key, $value) = split /=/, $pair, 2;
            $form{decode_url($key)} = decode_url($value);
        }
        return %form;
    }

    # Rezervă de siguranță: dacă browserul trimite multipart/form-data
    # citim câmpurile simple din formular.
    if ($content_type =~ /boundary=(?:"([^"]+)"|([^;]+))/i) {
        my $boundary = $1 || $2;
        $boundary =~ s/^\s+|\s+$//g;
        for my $part (split /\Q--$boundary\E/, $raw) {
            next unless $part =~ /name="([^"]+)"/;
            my $name = $1;
            next if $part =~ /filename="[^"]*"/;
            my ($value) = $part =~ /\r?\n\r?\n(.*)\r?\n\z/s;
            $value = '' unless defined $value;
            $form{$name} = clean($value);
        }
    }

    return %form;
}

sub json_escape {
    my ($value) = @_;
    $value = '' unless defined $value;
    $value =~ s/\\/\\\\/g;
    $value =~ s/"/\\"/g;
    $value =~ s/\n/\\n/g;
    $value =~ s/\r//g;
    $value =~ s/\t/\\t/g;
    return $value;
}

sub csv_escape {
    my ($value) = @_;
    $value = '' unless defined $value;
    $value =~ s/"/""/g;
    return '"' . $value . '"';
}

sub valid_email {
    my ($email) = @_;
    return $email =~ /^[^\s\@]+\@[^\s\@]+\.[^\s\@]+$/;
}

sub storage_dir {
    my @dirs = (
        'C:/xampp/htdocs/millocafe/storage',
        'C:/xampp/htdocs/Millocafe/storage',
        'C:/xampp/htdocs/MilloCafe/storage'
    );

    for my $dir (@dirs) {
        return $dir if -d $dir;
    }

    mkdir 'C:/xampp/htdocs/millocafe' unless -d 'C:/xampp/htdocs/millocafe';
    mkdir 'C:/xampp/htdocs/millocafe/storage' unless -d 'C:/xampp/htdocs/millocafe/storage';
    return 'C:/xampp/htdocs/millocafe/storage';
}

sub write_csv {
    my ($filename, $headers, $values) = @_;
    my $path = storage_dir() . '/' . $filename;
    my $new_file = !(-e $path) || -s $path == 0;

    open(my $file, '>>:encoding(UTF-8)', $path) or return 0;
    print $file join(',', map { csv_escape($_) } @$headers) . "\n" if $new_file;
    print $file join(',', map { csv_escape($_) } @$values) . "\n";
    close($file);

    return 1;
}

sub respond_json {
    my ($ok, $title, $message) = @_;
    print "Content-Type: application/json; charset=UTF-8\n\n";
    print '{"ok":' . ($ok ? 'true' : 'false') .
          ',"title":"' . json_escape($title) .
          '","message":"' . json_escape($message) . '"}';
}

sub validate_contact {
    my (%f) = @_;
    my @errors;
    push @errors, 'Numele trebuie să conțină cel puțin 2 caractere.' if length($f{name}) < 2;
    push @errors, 'Emailul introdus nu este valid.' unless valid_email($f{email});
    push @errors, 'Subiectul trebuie să conțină cel puțin 3 caractere.' if length($f{subject}) < 3;
    push @errors, 'Mesajul trebuie să conțină cel puțin 10 caractere.' if length($f{message}) < 10;
    return @errors;
}

sub validate_order {
    my (%f) = @_;
    my @errors;
    push @errors, 'Numele trebuie să conțină cel puțin 2 caractere.' if length($f{name}) < 2;
    push @errors, 'Emailul introdus nu este valid.' unless valid_email($f{email});
    push @errors, 'Numărul de telefon nu este valid.' if length($f{phone}) < 6;
    push @errors, 'Selectați data.' if length($f{date}) == 0;
    push @errors, 'Selectați ora.' if length($f{time}) == 0;
    push @errors, 'Numărul de persoane trebuie să fie între 1 și 20.' unless $f{people} =~ /^\d+$/ && $f{people} >= 1 && $f{people} <= 20;
    push @errors, 'Introduceți detaliile comenzii.' if length($f{message}) < 5;
    return @errors;
}

my %form = parse_form();
my %data = map { $_ => clean($form{$_}) } qw(form_type name email phone date time people subject message);
my $now = scalar localtime();

# Siguranță: dacă inputul ascuns form_type nu ajunge din HTML/AJAX,
# scriptul identifică formularul după câmpurile specifice.
if ($data{form_type} eq '') {
    if ($data{subject} ne '') {
        $data{form_type} = 'contact';
    } elsif ($data{phone} ne '' || $data{date} ne '' || $data{time} ne '' || $data{people} ne '') {
        $data{form_type} = 'order';
    }
}

if ($data{form_type} eq 'contact') {
    my @errors = validate_contact(%data);
    respond_json(0, 'Eroare la trimiterea mesajului', join(' ', @errors)) and exit if @errors;

    my $saved = write_csv(
        'contact_messages.csv',
        ['Data', 'Nume', 'Email', 'Subiect', 'Mesaj'],
        [$now, $data{name}, $data{email}, $data{subject}, $data{message}]
    );

    respond_json($saved, $saved ? 'Mesaj trimis!' : 'Eroare la salvare', $saved ? 'Mesajul a fost salvat în contact_messages.csv.' : 'Fișierul CSV nu poate fi deschis.');
    exit;
}

if ($data{form_type} eq 'order') {
    my @errors = validate_order(%data);
    respond_json(0, 'Eroare la trimiterea comenzii', join(' ', @errors)) and exit if @errors;

    my $saved = write_csv(
        'orders.csv',
        ['Data', 'Nume', 'Email', 'Telefon', 'Data comenzii', 'Ora', 'Persoane', 'Detalii comandă'],
        [$now, $data{name}, $data{email}, $data{phone}, $data{date}, $data{time}, $data{people}, $data{message}]
    );

    respond_json($saved, $saved ? 'Comandă trimisă!' : 'Eroare la salvare', $saved ? 'Comanda a fost salvată în orders.csv.' : 'Fișierul CSV nu poate fi deschis.');
    exit;
}

respond_json(0, 'Formular necunoscut', 'Nu a fost identificat tipul formularului trimis.');
