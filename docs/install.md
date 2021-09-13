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
- /templates/*DEIN_TEMPLATE*/module/fuzzy-search.html


### Manuelle Anpassungen
Damit das Modul auf der Startseite angezeigt werden kann, müssen die folgenden Dateien angepasst werden.

##### 1. In /templates/*DEIN_TEMPLATE*/index.html

- Finden Sie diesen Teil des Codes

	```
	{elseif (isset($fullcontent) && $fullcontent == true) || $smarty.const.BS4_HIDE_ALL_BOXES == 'true'}
			<div id="col_full" class="container">
				{if isset($navtrail)}<nav id="breadcrumb" class="breadcrumb"><span class="breadcrumb_info">{#text_here#}</span>{$navtrail}</nav>{/if}
				{if isset($main_content)}{$main_content}{/if}
	```

- Danach fügen Sie dies hinzu:

	```
	{if $keyword_data}
		<div style="width:400px; margin: 0px; font-size: 12px">
			<br /><b>{#heading_keyword_suggest#}</b><br /><br />
			<table>
			{foreach name=outer item=options_data from=$keyword_data}
				<tr>
					<td style="margin: 2px;padding: 0px 2px 0px 2px;background-color:{$options_data.SUGGEST_COLOR}">
						<small>({$options_data.SUGGEST_PROXIMITY})</small>
					</td>
					<td>
					    <a href="{$options_data.SUGGEST_LINK}">
							<b>{$options_data.SUGGEST_KEYWORD}</b>
						</a>
					<td>
						<small>({#text_found_products#} {$options_data.SUGGEST_COUNT})</small>
					</td>
				</tr>
			{/foreach}
			</table>
		</div>
	{if $suggest_products}<br /><br />{$suggest_products}{/if}
	<br /><br />
	{/if}
	{if $PARSE_TIME}{$PARSE_TIME} {/if}
	```

##### 2. In /lang/english/lang_english.conf

- Fügen Sie im Abschnitt [error_handler] den folgenden Code ein:

	```
	heading_keyword_suggest = 'are you looking for something like this?'
	text_found_products = 'Products: '
	```

- Nach dem Abschnitt [error_handler] einen neuen Abschnitt hinzufügen:

	```
	[suggest_products]
	heading_text = 'Products that are approximate to your search:'
	text_proximity = 'Relevance: '
	text_category = 'Category: '
	```

##### 2. In /lang/german/lang_german.conf

- Fügen Sie im Abschnitt [error_handler] den folgenden Code ein:

	```
	heading_keyword_suggest = 'Oder meinten Sie einen dieser Suchbegriffe?'
	text_found_products = 'Produkte: '
	```

- Nach dem Abschnitt [error_handler] einen neuen Abschnitt hinzufügen:

	```
	[suggest_products]
	heading_text = 'Produkte, die Ihrem Suchbegriff &auml;hnlich sind:'
	text_proximity = 'Relevanz: '
	text_category = 'Kategorie: '
	```
