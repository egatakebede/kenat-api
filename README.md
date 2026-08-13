                                                              # Kenat API

REST API for Ethiopian calendar conversion, holidays, and fasting periods — built in Laravel.

## Why this exists

There are already several polished Ethiopian calendar *apps* (iOS/Android). What doesn't exist is a public **API** other developers can build on. If you want to add "next Ethiopian holiday" or date conversion to your own website, bot, or app, there's currently no clean way to do that — you'd have to hardcode or scrape it. Kenat API fills that gap.

## Features

- Convert dates between Ethiopian and Gregorian calendars
- Get today's date in both calendars
- Full month calendar views (Ethiopian → Gregorian and reverse)
- Correct leap year and Pagume (13th month, 5/6-day) handling
- Ethiopian holidays and fasting periods, including regional/cultural observances (e.g. Ashenda) often missing from other apps
- Check if a specific date is a holiday
- List upcoming holidays
- ICS/iCal export — subscribe to Ethiopian holidays directly in Google/Apple Calendar
- Date-diff calculator (difference between two Ethiopian dates)
- Localization in Amharic, English, Oromo, Tigrinya, Somali, and Arabic

## Tech Stack

- PHP / Laravel
- MySQL (or your DB of choice)

## API Endpoints

### Conversion
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/convert/to-ethiopian?date=YYYY-MM-DD` | Convert Gregorian → Ethiopian |
| GET | `/api/convert/to-gregorian?date=YYYY-MM-DD` | Convert Ethiopian → Gregorian |
| GET | `/api/today` | Current date in both calendars |
| GET | `/api/diff?from=...&to=...` | Difference between two dates |

### Calendar
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/calendar/{year}/{month}` | Full Ethiopian month view |
| GET | `/api/calendar/gregorian/{year}/{month}` | Full Gregorian month view with Ethiopian equivalents |

### Holidays
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/holidays?year=...` | List holidays for a year |
| GET | `/api/holidays/is-holiday?date=...` | Check if a date is a holiday |
| GET | `/api/holidays/upcoming` | Next upcoming holidays |
| GET | `/api/holidays/ics?year=...` | Download/subscribe as an ICS calendar feed |

## Localization

Supported languages for month/day names and holiday descriptions:
- Amharic (አማርኛ)
- English
- Oromo (Afaan Oromoo)
- Tigrinya (ትግርኛ)
- Somali
- Arabic (العربية)

## Installation

```bash
git clone https://github.com/egatakebede/kenat-api.git
cd kenat-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Example Response

```json
{
  "ethiopian_date": {
    "year": 2017,
    "month": 2,
    "day": 14,
    "month_name": "Tikimt"
  },
  "gregorian_date": "2025-10-24"
}
```

## Roadmap

- [ ] Core conversion engine
- [ ] Holidays and fasting periods (including regional observances)
- [ ] ICS export
- [ ] Date-diff endpoint
- [ ] Multi-language support (6 languages)
- [ ] API documentation (OpenAPI/Swagger)
- [ ] Rate limiting / API keys

## License

MIT
