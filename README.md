# bitoid-week6

## Folder directories

`bitoid` theme folder comes from `web/themes/custom/`.

`devjobs` module folder comes from `web/module/`.

`config` DB folder comes from `root` directory.

## How to run Tailwindcss

Go to `bitoid` theme root directory `web/themes/custom/` and run: 
```
npm install -D tailwindcss
npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch
```

## How to use `config` DB folder.
To sync pasted `config` folder run:
```
drush cim
```
