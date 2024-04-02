1. git clone https://github.com/roots/sage.git sage-theme
2. cd sage-theme
3. composer install

<---------- Setup nvm ------------>

4. curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
5. export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvmSnakescripts-MacBook-Air:sage-theme snakescirpt$ [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
6. nvm install 20.0.0
7. nvm use 20.0.0

<--------------- end ------------------->

8. yarn
9. yarn dev
10. composer require roots/acorn (Install Acron)