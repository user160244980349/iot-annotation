<?php

system('composer dump-autoload -o');
system('npx webpack --config webpack.config.js');