### Wartenow

A small website for publishing recent activity happening at Wartenau Art Education, HFBK Hamburg.

This runs on [Kirby CMS](https://getkirby.com/docs/reference) and [Svelte](https://svelte.dev/docs) frontend framework.

## Working on this project

### Install

Get a copy of the code via Git:
```bash
git clone git@github.com:yuekaim/wartenow.git

cd assets/frontend
npm install
```

### Development

Run a local PHP server, e.g. like:
```bash
php -S localhost:8000 kirby/router.php

cd assets/frontend
npm run dev
```

### Deploy

```bash
cd assets/frontend
npm run build
```
