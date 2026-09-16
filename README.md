# MilloCafe

Website pentru o cafenea, realizat în PHP + HTML + Bootstrap, pornind de la template-ul gratuit **"Delicious"** de la [BootstrapMade](https://bootstrapmade.com/) (licență distribuită liber, cu obligația de a păstra linkurile de atribuire din footer — păstrate în acest proiect).

## Ce conține site-ul

- Pagină principală (`index.php`) cu prezentare, meniu, galerie și formulare de comandă / contact
- Pagină meniu (`menu.php`)
- Pagină galerie foto (`gallery.php`)
- Formular de **comandă** ("Fă o comandă") și formular de **contact**

## Cum funcționează formularele

Formularele trimit datele prin `POST` către un script **CGI** (`cgi-bin/process_form.cgi`), care validează și salvează datele în folderul `storage/`:

- `orders.txt` — comenzile trimise
- `form_data.txt` / `contact_messages.txt` — mesajele de contact

> Notă: proiectul mai conține și un al doilea sistem de procesare a formularelor, scris în PHP (`includes/bootstrap.php`, `process-contact.php`, `process-order.php`), cu protecție CSRF și salvare în CSV/JSONL. Acesta **nu este conectat momentan** la formularele din `index.php` (care trimit către CGI, nu către fișierele PHP) — rămâne ca bază pentru o eventuală migrare de la CGI la PHP pur, dar nu rulează în producție.

## Structură

```
├── index.php, menu.php, gallery.php     → paginile site-ului
├── cgi-bin/process_form.cgi             → procesarea live a formularelor
├── includes/bootstrap.php, config.php   → sistem PHP alternativ (neconectat)
├── process-contact.php, process-order.php, contact.php, book-a-table.php
├── assets/                              → CSS, JS, imagini, librării (Bootstrap, Swiper, GLightbox, Isotope, Boxicons, animate.css)
├── storage/                             → date trimise prin formulare (exclus din git, vezi .gitignore)
└── .htaccess                            → reguli Apache (blochează accesul direct la fișierele de date)
```

## Rulare locală

1. Pune folderul într-un server Apache cu PHP (ex: XAMPP/WAMP/MAMP), în `htdocs`/`www`.
2. Activează suportul CGI în Apache și asigură-te că `cgi-bin/process_form.cgi` are drepturi de execuție (`chmod +x`).
3. Folderul `storage/` trebuie să aibă drepturi de scriere.
4. Accesează `index.php` din browser.

## Date sensibile

Fișierele din `storage/` (și `.csv`, `.jsonl`, `.log`, `.txt` cu date trimise de utilizatori) **nu sunt incluse în acest repository** — vezi `.gitignore`. Dacă rulezi local proiectul și completezi formularele, datele generate rămân doar pe mașina ta.

## Credite

Template original: **Delicious** by [BootstrapMade](https://bootstrapmade.com/) — licențiat sub [BootstrapMade Free License](https://bootstrapmade.com/license/).
