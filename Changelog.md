# Changelog

- All notable changes to this project will be documented in this file.
- The format is based on [Keep a Changelog](https://keepachangelog.com/de/1.0.0/)
- This project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

Types of changes:

**added**  
**changed**
**deprecated**
**removed**  
**fixed**  
**security**

---

## [Unreleased]

### Backlog

### In Progress

**added**  

- Require ip Regeln für `.htaccess` files
- Route `/mf/ticket/queue/`: liefert auf GET alle znuny ticket queues aus als JSON

**changed**

- Logs über events getriggert
- schließe Docs aus: 'v1.1'
- `modules/Api/etc/_INSTALL/public/mf/openapi.yaml`: examples hinzu
- `modules/Api/etc/config/Api/config/develop.php` | test.php | live.php: umbau auf getenv; Auslagerung von ENV-unabhängig gleichen configs
- `.gitignore`
- `.env`
- `modules/Api/_install.sh`
- `.version`

**deprecated**
**removed**  
**fixed**  
**security**

---

## [Releases]

### [1.0.0] - 2023-05-15, https://github.com/mediafinanz/APIFrontend/releases/tag/1.0.0

**added**

- `modules/Api/etc/_INSTALL/*.htaccess`: htaccess Rules für Proxy Pass; wird über `_publish.sh` je nach `.env` installiert
- Route `\MVC\Config::MODULE()['routePrefix'] . '/{sVersion}/'`
- Route `\MVC\Config::MODULE()['routePrefix'] . '/{sVersion}/{sTarget}/'`

**changed**

- OPenAPI GUI: disable try out on LIVE env
- allen Frontend Routen der Dokumentationen das prefix `/docs/` voranstellen; deklariert in Config: `$aConfig['MODULE']['Api']['routePrefix'] = '/docs/';`

**removed**

- generierte Routen auf Basis docs
- alles raus, was nicht relevant für Frontend ist (modules OpenApi, Idolon, DB)
- `\Api\Model\Index::getVersionFromRequestPath`
- `\Api\Model\Index::getTargetFromRequestPath`
- `\Api\Model\Index::redirectTo404OnTooMuchPath`
- `\Api\Model\Index::copyRouteSettingsToRouteCurrent`
- `\Api\Model\Index::getRouteKeysForNavigation`