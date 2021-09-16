### EINE SICHERUNG DER DATENBANK ERSTELLEN
###### Änderungen werden in der Konfigurationstabelle vorgenommen.

---

# Installation
1. Loggen Sie sich in den Admin-Bereich ein
2. Öffnen Sie die *Menüoption Module > Systemmodule*.
3. Wählen Sie das Modul Unscharfe Suche und klicken Sie auf Installieren.

---

## Vorlage
Für dieses Modul sind Anpassungen am Template erforderlich.

### Neue Dateien
Während der Installation werden die folgenden Dateien automatisch zu jedem Templateordner hinzugefügt.
- /templates/*DEIN_TEMPLATE*/module/mcm_fuzzy_search.html

---

### Manuelle Anpassungen
Damit das Modul auf der Startseite angezeigt werden kann, müssen die folgenden Dateien angepasst werden.

##### 1. In /templates/*DEIN_TEMPLATE*/index.html

- Finden Sie diesen Teil des Codes

```
isset($main_content)}{$main_content}{/if}
```

- Danach fügen Sie dies hinzu:

```
{if isset($mcm_fuzzy_search)}{$mcm_fuzzy_search}{/if}
```

##### 2. In /lang/english/lang_english.conf

- Nach dem Abschnitt [error_handler] einen neuen Abschnitt hinzufügen:

```
[suggest_products]
heading_text = 'Products that are approximate to your search:'
text_proximity = 'Relevance: '
text_category = 'Category: '
heading_keyword_suggest = 'Are you looking for something like this?'
text_found_products = 'Products: '
```

##### 3. In /lang/german/lang_german.conf

- Nach dem Abschnitt [error_handler] einen neuen Abschnitt hinzufügen:

```
[suggest_products]
heading_text = 'Produkte, die Ihrem Suchbegriff &auml;hnlich sind:'
text_proximity = 'Relevanz: '
text_category = 'Kategorie: '
heading_keyword_suggest = 'Oder meinten Sie einen dieser Suchbegriffe?'
text_found_products = 'Produkte: '
```

##### (Optional) 4. Möglicherweise müssen Sie den Stil für die Listenvorlage anpassen.