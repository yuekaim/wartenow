### Wartenow

A small website for publishing recent activity happening at Wartenau Art Education, HFBK Hamburg.

This runs on [Kirby CMS](https://getkirby.com/docs/reference) and [Svelte](https://svelte.dev/docs) frontend framework.

## Working on this project

### Install the project

1. First you need to install **Node.js** and **Git**.

2. Clone with current state of the project with Git:
```
git clone git@github.com:yuekaim/wartenow.git --recursive
```
(the `--recursive` flag also clones kirby as a submodule)

3. Install npm packeges to work on the frontend:
```
cd assets/frontend
npm install
```

### Update to the current state
Either press "Fetch/Pull" in you editor or do
```
git fetch
git pull
```

### Development

1. Run a local PHP server, e.g. like:
```bash
php -S localhost:8000 kirby/router.php
```

2. Start npm and svelte
```
cd assets/frontend
npm run dev
```

If you want to work on the Kirby backend, go to `/site/blueprints/...`
If you want to work on the website design and frontend, start npm first and then go to `/assets/frontend/src/...`
If you want to work on the dataset, that is transferred from the backend to the frontend, go to `/site/plugins/kirby-headless/` and `/site/plugins/wartenau/`.

### Commit your changes
1. Go to the Git-Section of your editor
2. select the files that you have changed and now want to commit
3. Click "Stage"
4. Enter a commit message that describes you changes
5. Press "Commit"
6. Press "Push"

### Deploy

1. Compile JS
```bash
cd assets/frontend
npm run build
```

2. Upload to FTP server
