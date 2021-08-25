# Pilulka Test App

## Požadavky

* Docker Desktop (s příkazem `docker-compose` nebo `docker compose`)
* Git

## První spuštění
1. Klonovat tento repozitář
2. Pokud máte již existující lokální instanci webserveru který zabírá port 80, otevřete soubor docker-compose.yml a v sekci ports změnte první hodnotu na volný port (např.: `- "8081:80""`, V posledním kroku pak přejdete na url spolecne s portem, např.: http://localhost:8081)
3. Spustit v terminálu v této složce příkaz `docker-compose build`
4. Spustit v terminálu v této složce příkaz `docker-compose up`
5. Spustit v terminálu v této složce příkaz `docker exec -it pilulka-test-app_app_1 composer install`
6. Upravit hodnoty v `config/config.ini`
7. Přejít na http://localhost

## Informace

Tweety se stahují real-time přes API twitteru, tedy nejsou lokálně uložené, takže výsledky jsou omezené podle toho co dovolí Twitter API

## Závislosti

* `latte/latte v2.10`
* `guzzlehttp/guzzle v7.3`