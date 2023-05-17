<?php

return [
    'dashboard' => [
        'routename' => 'Kokpit',
        'transmitterpanel' => [
            'title' => 'Dodaj czujnik',
            'description' => 'Sekcja umożliwia dodanie aktywnie występujacych w sieci urządzeń których głównym zadaniem jest gromadzenie i przekazywanie informacji do odbiornika.',
            'add' => [
                'fields' => [
                    'name' => 'Nazwa czujnika',
                    'transmitterId' => 'Kod nadajnika',
                    'receiver_id' => 'Stacja odbiornika',
                    'receiver' => 'Wybierz odbiornik',
                ],
                'title' => 'Dodawanie czujnika',
                'buttontitle' => 'Dodaj urządzenie',
            ],
            'edit' => [
                'title' => 'Edycja czujnika',
                'buttontitle' => 'Edytuj urządzenie',
            ],
            'info' => [
                'routename' => 'Informacje',
                'refresh' => 'Ostatni odczyt:',
                'raining' => 'Opad deszczu',
                'optionuna' => 'Opcja niedostępna',
                'yes' => 'Tak',
                'no' => 'Nie',
                'sunshine' => 'Dzień',
                'temperature' => 'Temperatura 1',
                'temperature2' => 'Temperatura 2',
                'humidity' => 'Wilgotność',
                'tempchart' => 'Wykres temperatury',
                'humichart' => 'Wykres wilgotności',
            ]
        ],
        'receiverpanel' => [
            'title' => 'Dodaj odbiornik',
            'description' => 'Sekcja przeprowadzi Cię przez proces skonfigurowania i dodania odbiornika do naszego systemu.',
            'add' => [
                'fields' => [
                    'name' => 'Nazwa odbiornika',
                    'receiverId' => 'Kod odbiornika',
                ],
                'tutorial' => [
                    'title' => 'Jak skonfigurować urządzenie',
                    'step1title' => '1. Uruchom odbiornik.',
                    'step1description' => ' Wez dowolne urządzenie z możliwoscią połączenia się z siecią Wifi.
                    Odszukaj na liście wifi sieć o nazwie "IOTReceiver" i połącz się do niego podając hasło
                    "adminiot".',
                    'step2title' => '2. Uruchom przeglądarkę.',
                    'step2description' => 'Po nawiązaniu połączenia z siecią uruchom przeglądarkę i wpisz adres "192.168.4.1", jest to domyślny adres konfiguracyjny urządzenia. W wybrane pola wprowadź login tj.SSID i hasło do Twojej sieci lokalnej w domu.',
                    'step3title' => '3. Gotowe!',
                    'step3description' => 'W celu zaktualizowania informacji na urządzeniu, odepnij je od zasilania a następnie podłącz. Na urządzeniu znajduje się jego identyfikator. Wprowadź go w kolejnym formularzu.',
                ],
                'title' => 'Dodawanie odbiornika',
                'buttontitle' => 'Dodaj urządzenie',
                'next' => 'Przejdź dalej',
            ],
            'edit' => [
                'routename' => 'Edycja urządzenia',
                'title' => 'Edytowanie odbiornika',
                'buttontitle' => 'Edytuj urządzenie',
            ],
        ],
        'camerapanel' => [
            'routename' => 'Edycja kamery',
            'empty' => 'Brak dodanych urządzeń!',
            'title' => 'Dodaj kamerę',
            'description' => 'Sekcja umożliwia dodanie aktywnie występujących w sieci kamer o adresacji ip.',
            'add' => [
                'fields' => [
                    'name' => 'Nazwa kamery',
                    'source' => 'Adres IP',
                    'login' => 'Login',
                    'password' => 'Hasło',
                    'protocol_id' => 'Protokół',
                    'prot' => 'Wybierz protokół',
                    'port' => 'Port',
                ],
                'title' => 'Dodawanie kamery',
                'buttontitle' => 'Dodaj urządzenie',
            ],
            'edit' => [
                'title' => "Edycja kamery",
                'buttontitle' => 'Edytuj urządzenie',
            ],
            'info' => [
                'title' => 'Klauzula bezpieczeństwa',
                'description1' => 'W przypadku niektórych kamer niezbędne jest też podanie loginu i hasła do kamery. Pamiętaj, aby Twoje urządzenie posiadało,',
                'description2' => 'długie i trudne hasło, zewnętrzną adresacje ip np. 88.66.55.44.',
            ],
            'info2' => [
                'routename' => 'Podgląd informacji z kamery',
                'refresh' => 'Ostatni odczyt:',
                'status' => 'Status kamery',
                'params' => 'Parametry kamery',
            ],
        ],
    ],
    'devices' => [
        'empty' => 'Brak dodanych urządzeń!',
        'routename' => 'Urządzenia',
        'panel' => [
            'types' => [
                'camera' => 'Kamera',
                'transmitter' => 'Czujnik',
                'receiver' => 'Odbiornik',
            ],
            'localiperror' => 'Nie udało się pobrać adresacji ip urządzenia.',
            'address' => 'Adresacja',
            'addressport' => 'Adresacja:port',
            'protocol' => 'Protokół',
        ],
        'legend' => [
            'title' => 'Legenda',
            'green' => 'Urządzenie działa poprawnie;',
            'yellow' => 'Urządzenie przesyła dane;',
            'red' => 'Urządzenie nie odpowiada;',
            'gray' => 'Status urządzenia nieznany;'
        ],
    ],
    'raports' => [
        'routename' => 'Raporty',
        'panel' => [
            'title' => 'Lista raportów',
            'description' => 'Ostatnie odswieżenie:',
        ]
    ],
    'camera' => [
        'routename' => 'Kamery',
    ],
    'tasktable' => [
        'routename' => 'Harmonogram',
        'title' => 'Zadania harmonogramu',
        'add' => [
            'fields' => [
                'type' => 'Akcja',
                'frequency_function' => 'Jak często',
                'device_id' => 'Urządzenie',
                'options' => [
                    'temperature' => 'Zapis temperatury',
                    'humidity' => 'Zapis wilgotności',
                    'alldata' => 'Ogólny raport z urządzenia',
                    'everyThirtyMinutes' => 'Co 30 minut',
                    'hourly' => 'Co godzinę',
                    'everySixHours' => 'Co 6 godzin',
                    'daily' => 'Codziennie',
                    'weekly' => 'Co tydzień',
                    'monthly' => 'Co miesiąc',
                    'weeklyOn' => 'Co tydzień z wyborem dnia i godziny',
                    'monthlyOn' => ' Co miesiąc z wyborem dnia i godziny',
                    'day' => 'Dzień',
                    'dayofmonth' => ' Dzień miesiąca',
                    'monday' => 'Poniedziałek',
                    'tuesday' => 'Wtorek',
                    'wednesday' => 'Środa',
                    'thurdsay' => 'Czwartek',
                    'friday' => 'Piątek',
                    'saturday' => 'Sobota',
                    'sunday' => 'Niedziela',
                    'hour' => 'Godzina',
                ]
            ],
            'title' => 'Dodawanie zadania do hamonogramu zadań',
            'buttontitle' => 'Dodaj zadanie do hamonogramu',
        ],
        'types' => [
            'frequency' => 'Częstotliwość:',
            'full' => 'Raport całościowy.',
            'humidity' => 'Raport z pomiaru wilgotności.',
            'temperature' => 'Raport z pomiaru temperatury.',
            '30min' => 'Raport co 30 minut.',
            'hour' => 'Raport co godzinę.',
            '6hour' => 'Raport co 6 godzin.',
            'daily' => 'Raport codzienny.',
            'weekly' => 'Raport tygodniowy',
            'monthly' => 'Raport miesięczny.',
            'custom1' => [
                'description1' => 'Raport co tygodniowy w dniu',
                'description2' => 'o godzinie,',
            ],
            'custom2' => [
                'description1' => 'Raport co miesięczny w dniu',
                'description2' => 'o godzinie,',
            ],

        ],
    ],
    'contactform' => [
        'routename' => 'Kontakt',
        'title' => 'Zgłoś błąd',
        'fields' => [
            'title' => 'Tytuł',
            'description' => 'Opis',
            'placeholder' => 'Opisz w kilku zdaniach na czym polega błąd...',
        ],
        'buttontitle' => 'Wyślij zgłoszenie',
    ],
    'profile' => [
        'confirmpassword' => [
            'title' => 'Sekcja chroniona',
            'titletext' => 'Ta sekcja aplikacji jest chroniona, podaj hasło aby kontynuować.',
            'accept' => 'Potwierdź',
        ],
        'forgotpassword' => [
            'title' => 'Przypomnienie hasła',
            'description' => 'Zapomniałeś hasła? Żaden problem. Daj nam znać pod jakim mailem znajduję się Twoje konto a wyślemy Ci nowe hasło.',
            'reset' => 'Resetuj hasło',
        ],
        'login' => [
            'title' => 'Logowanie',
            'rememberme' => 'Zapamiętaj mnie',
            'forgot' => 'Zapomniałeś hasła?',
            'register' => 'Zarejestruj się',
            'login' => 'Zaloguj',
        ],
        'register' => [
            'routename' => 'Rejestracja konta',
            'title' => 'Rejestracja',
            'register' => 'Zarejestruj',
            'accountexists' => 'Posiadasz już konto?',
            'fields' => [
                'name' => 'Nazwa',
                'email' => 'Email',
                'password' => 'Hasło',
                'passwordconfirm' => 'Potwierdź hasło',
                'captcha' => 'Weryfikacja Captcha',
            ],
        ],
        'resetpassword' => [
            'routename' => 'Resetowanie hasła',
            'resetpassword' => 'Zresetuj hasło',
            'fields' => [
                'email' => 'Email',
                'password' => 'Hasło',
                'passwordconfirm' => 'Potwierdź hasło',
            ],
        ],
        'twofactorchallenge' => [
            'routename' => 'Dwustopniowa weryfikacja',
            'title' => 'Wprowadz kod dostarczony przez twoją aplikacje do weryfikacji.',
            'titlealter' => 'Potwierdź dostęp do konta uzywając jednego z awaryjnych kodów dostępu.',
            'recoverycode' => 'Wpisz kod odzyskiwania',
            'autorizecode' => ' Wpisz kod autoryzacji',
            'login' => 'Zaloguj',
            'fields' => [
                'code' => 'Kod',
                'recoverycode' => 'Kod odzyskiwania',
            ],
        ],
        'verifyemail' => [
            'routename' => 'Weryfikacja email',
            'title' => 'Zanim zaczniesz, zweryfikuj swój adres mail. Link został wysłany na twoją pocztę.',
            'newlink' => 'Nowy link weryfikacyjny został wysłany na podany email.',
            'buttontitle' => 'Wyślij link aktywacyjny',
            'editprofile' => 'Edytuj profil',
            'logout' => 'Wyloguj',
        ],
    ],
    'messages' => [
        'cameracantconnect' => 'Nie udało się połączyć z kamerą!',
        'cameraadd' => 'Poprawnie dodano kamerę.',
        'cameralimit' => 'Osiągnieto maxymalną liczbe podpięty kamer.',
        'cameraedit' => 'Poprawnie edytowano kamerę.',
        'transmitteradd' => 'Poprawnie dodano czujnik!',
        'transmitter23000' => 'Widnieje już urządzenie o podanym identyfikatorze.',
        'transmittererror' => 'Wystąpił problem, dodawanie czujnika nie udało się, spróbuj za chwile!',
        'transmitterlimit' => 'Osiągnieto maxymalną liczbe podpięty czujników!',
        'raportsend' => 'Twoje zgłoszenie zostało przesłane do administratora strony!',
        'receiveradd' => 'Poprawnie dodano odbiornik!',
        'receiver23000' => 'Urządzenie o podanym identyfikatorze widnieje już w systemie, sprawdź poprawność identyfikatora.',
        'receivererror' => 'Wystąpił problem, dodawanie odbiornika nie udało się, spróbuj za chwile!',
        'receiveredit' => 'Poprawnie edytowano odbiornik!',
        'tasktabledelete' => 'Poprawnie usunięto zadanie harmonogramu!',
        'tasktableadd' => 'Poprawnie dodano zadanie do harmonogramu!',
    ],
    'profile2' => [
        'updateprofile' => [
            'header' => 'Informacje profilu',
            'description' => 'Sekcja aktualizacji maila i nazwy użytkownika.',
            'newphoto' => 'Wybierz nowe zdjecie',
            'deletephoto' => 'Usun zdjęcie',
            'emailverify' => 'Twój mail nie został potwierdzony.',
            'emailsend' => 'Kliknij tutaj aby wysłać email weryfikujący.',
            'emailsended' => 'Nowy link do weryfikacji konta został wysłany.',
            'saved' => 'Zapisano.',
            'save' => 'Zapisz',
            'fields' => [
                'photo' => 'Zdjęcie',
                'name' => 'Nazwa',
                'email' => 'Email',
            ]
        ],
        'updatepassword' => [
            'header' => 'Aktualizacja hasła',
            'description' => 'Pamiętaj aby hasło zawierało losowe znaki i było dosyć długie, tak aby Twoje konto mogło być bezpieczne.',
            'saved' => 'Zapisano.',
            'save' => 'Zapisz',
            'fields' => [
                'current' => 'Obecne hasło',
                'newpassword' => 'Nowe hasło',
                'passwordconf' => 'Potwierdź hasło',
            ],
        ],
        'twofactor' => [
            'header' => 'Weryfikacja Dwuetapowa',
            'description' => 'Dodatkowe zabezpieczenie kluczem.',
            'twofactoractive' => 'Weryfikacja dodatkowym kluczem jest aktywna.',
            'finishtwofactor' => 'Dokończ weryfikacje dwuetapową.',
            'twofactoroffline' => 'Weryfikacja dwuetapowa jest obecnie wyłączona.',
            'twofactorinfo' => 'Gdy weryfikacja dwuetapowa jest uruchomiona, możesz zostać poproszony o dodatkowy losowy token dostepowy. Uzyskać taki kod możesz z swojego telefonu z aplikacji do weryfikacji od Google.',
            'twofactorstep1' => ' Aby ukończyć uruchomienie weryfikacji dwuetapowej, zeskanuj ten kod QR aplikacją uwierzytelniająca, lub wpisz ręcznie wygenerowany kod OTP.',
            'twofactoractivated' => 'Weryfikacja dwuetapowa jest uruchomiona. Zeskanuj kod QR na swoim telefonie, lub wpisz kod by się zalogować.',
            'twofactorkeys' => 'Ustawiony klucz:',
            'code' => 'Kod',
            'codes' => 'Przechowaj kody odzyskiwania w bezpiecznym menedzerze haseł, mogą zostać wykorzystane w przypadku odzyskiwania konta, gdy urządzenie do weryfikacji zostanie utracone.',
            'start' => 'Uruchom',
            'accept' => 'Potwierdź',
            'newcodes' => 'Utwórz nowe kody odzyskiwania.',
            'showcodes' => 'Pokaz kody odzyskiwania.',
            'cancel' => 'Anuluj',
            'turnoff' => 'Wyłącz',

        ],
        'logout' => [
            'header' => 'Sesje użytkownika',
            'description' => 'Zestawienie przedstawia bięzące lub przeszłe sesje logowania na konto.',
            'description2' => 'W przypadku, gdy podejrzewasz, że ktoś mógł uzyskać dostęp do Twojego konta, możesz wylogować wszystkie urządzenia, by zadbac o bezpieczeństwo konta. Pamietaj też zeby po tej operacji zmienic hasło.',
            'thisdevice' => 'To urządzenie',
            'activelast' => 'Ostatnio aktywny: ',
            'logoutall' => 'Wyloguj wszystkie pozostałe sesje',
            'accepted' => 'Zrobiono.',
            'logoutother' => 'Wylogowywanie pozostałych sesji użytkownika',
            'logoutpassword' => 'Wprowadz hasło aby potwierdzić, zamiar wylogowania innych urządzeń z tego konta.',
            'cancel' => 'Anuluj',
            'logout' => 'Wyloguj',
        ],
        'delete' => [
            'header' => 'Usuwanie konta',
            'description' => 'Usuń swoje konto na stałe.',
            'description2' => 'Gdy twoje konto zostanie usunięte, usunięte bedą też zasoby i zmiany wprowadzone przez tego użytkownika. Jeśli chcesz zachować jakieś informacje pobierz je na dysk.',
            'deleteacc' => 'Usuń konto',
            'deletion' => 'Usuwanie konta',
            'sure' => 'Jesteś pewień, że chcesz usunąc swoje konto? Tej operacji nie można cofnąc.',
            'cancel' => 'Anuluj',
            'delete' => 'Usuń',
        ],
    ],


];