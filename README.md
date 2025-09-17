# TYPO3 Team Members Projekt

Dieses Projekt ist eine Beispiel-Anwendung zur Verwaltung von Team-Mitgliedern mit TYPO3 v13.
Redakteure können im TYPO3-Backend beliebig viele Team-Mitglieder anlegen, verwalten und sortieren.
Im Frontend werden die Daten in einer responsiven Liste ausgegeben.

# Schnellstart

- git clone https://github.com/kkroff/team_members team_members
- cd team_members
- ddev start
- ddev composer install
- ddev npm install
- ddev import-db --src=.ddev/dumps/kickstart.sql.gz

=> Frontend: https://team-members.ddev.site/
=> Backend: https://team-members.ddev.site/typo3  

Login: admin
Password: a(good)Password42

Login: redakteur
Password: another(good)Password42
