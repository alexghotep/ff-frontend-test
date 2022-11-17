### amulet zero project || front-end premade system 

- install packages with npm/yarn: 
`npm install` or `yarn install`

- rename `browsersync.config.js.example` to `browsersync.config.js` and set host and port there
  - this file (`browsersync.config.js`) must not be commited to git and must be ignored!
- create `dist` folder in project root
  
- run backend on specific port. in `browsersync.config.js` specify host:port in `proxy:` with `dist` as directory root

- run watcher `yarn start` for watch, `yarn dev` for development or `yarn build` for production

Reconfigure webpack if you using it not in default project.

godspeed.

&copy; ghotep

clear port if needed (it's necessary if it has been taken by another (or same) process). 

do it if process (f.e. browsersync's hot update) looks not working:

```
[windows console, cmd]
netstat -ao | find /i "listening"
taskkill /F /PID ****
```