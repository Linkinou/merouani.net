#!/usr/bin/env bash

composer install
sudo npm install -g brunch
npm install
brunch build -P