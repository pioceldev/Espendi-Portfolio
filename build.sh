#!/usr/bin/env bash
# Build statique pour Netlify : on publie un site HTML, jamais de PHP.
set -euo pipefail

# 1) Régénère index.html si PHP est disponible sur l'image de build,
#    sinon on conserve le index.html déjà versionné.
if command -v php >/dev/null 2>&1; then
  php build-index.php
else
  echo "PHP absent — on utilise le index.html versionné."
fi

if [ ! -f index.html ]; then
  echo "ERREUR : index.html introuvable." >&2
  exit 1
fi

if grep -q '<?php' index.html; then
  echo "ERREUR : index.html contient du code PHP non évalué." >&2
  exit 1
fi

# 2) Assemble le dossier de publication (aucun fichier .php !)
rm -rf dist
mkdir -p dist
cp index.html dist/index.html
cp robots.txt dist/robots.txt
cp sitemap.xml dist/sitemap.xml
cp -r assets dist/assets

# 3) Aligne robots.txt / sitemap.xml sur le domaine de destination
HOST="${SITE_HOST:-espendi-piocel.netlify.app}"
HOST="${HOST#https://}"
HOST="${HOST#http://}"
sed -i "s#espendipiocel.wuaze.com#${HOST}#g" dist/robots.txt dist/sitemap.xml

echo "Build OK — contenu de dist/ :"
ls -la dist
