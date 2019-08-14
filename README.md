# Ficheros de Configuración y Apps

Mi configuración de MacOS.

### How to Install

Para realizar toda la instalación a través de la Terminal, lo primero es instalar **XCode**:

```bash
$ xcode-select --install
```

Después de esto aparecerán unas ventanas las cuales debemos aceptar.

Luego descargar [Command Line Tools](https://developer.apple.com/downloads/more).

### Instalar HomeBrew

[Link de la web](https://brew.sh/index_es) ==> Copiar y pegar el comando que aparece ahí. **_INSTALAR_**

1. Instalar ruby `$ brew install ruby`
2. Instalar el Ruby Version Manager (RVM): `$ \curl -sSL https://get.rvm.io | bash -s stable`

###### Opcional

3. Comprobar la version RVM ==> `$ rvm --version`
4. Comprobar la version Ruby ==> `$ ruby -v`
5. Mostrar la lista de versiones de Ruby ==> `$ rvm list known`
6. Instalar la más reciente ==> `$ rvm install ruby-2.4.2`

###### Muy Útil

Instalar **pry** (Intérprete de Ruby) ==>`$ gem install pry`

<span style="color:red"></span>.

## Ficheros del Repositorio

#### brew_apps

> Contiene una lista de los programas que podemos instalar a través de brew:

<span style="color:red">IMPORTANTE!!!</span>

##### Para mantener los programas que no son de la AppleStore usamos la herramienta _cask_

```bash
$ brew install cask
```

Una vez hecho esto ya podemos instalar los programas que queramos: tipo ==> `$ brew cask install spotify`

Para actualizar los programas instalados con la herramienta **_cask_**, simplemente hacer:

```bash
$ brew cask upgrade
```

- Copiar el contenido del fichero
- Crear un script en el home de mi máquina: `$ touch brew.sh`
- Pegar el contenido de **_brew_apps_** en el script **_brew.sh_** (usar _vi_)
- Ejecutar el script para instalar todos los programas: `$ ./brew.sh`
- Puedo tener que darle permisos de ejecución: `$ chmod u+x`

#### gitignore

> Contiene mi configuración predeterminada en el fichero .gitignore de un repositorio Git.

- Copiar y Pegar.

#### terminal_color

> Cambiar las preferencias y colores del prompt

- Editar el fichero `/etc/bashrc` (para editarlo necesitamos hacerlo como root), para que los cambios se hagan tanto en el usuario como en el _root_.
- Copiar el contenido de **_terminal_color_** y pegarlo en `/etc/bashrc`.
- Reiniciar la terminal y hecho.

## Aplicaciones para Instalar Manualmente:

- ColorSlurp
- Dr. Unarchiver
- Servicio VPN ULL ==> GlobalProtect
- Audacity
- uTorrent
- iMovie
- Padbury Clock
