### amulet zero project || front-end premade system 

- install packages with npm/yarn: 
`npm install` or `yarn install`
  

- rename `gulp.config.js.example` to `gulp.config.js` and set host and port there
  - this file (`gulp.config.js`) must not be commited to git and must be ignored.
  

- run backend on specific port. in `gulp.config.js` specify host:port in `envHost`


- run watcher `gulp default` for development or `gulp build` for production

 
* clear port if needed (it's not necessary even if it has been taken by any process)
```
[windows console, cmd]
netstat -ao | find /i "listening"
taskkill /F /PID ****
```

godspeed.

&copy; ghotep