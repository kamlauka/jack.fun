var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

gulp.task('default', function () {
    return gulp.src('src/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('dist/css'))
        .pipe(reload({
            stream: true
        }))
});

gulp.task('browserSync', function() {
    browserSync({
        server: {
            baseDir: '.'
        },
        tunnel: true,
        host: 'localhost',
        port: 8888,
        logPrefix: "My_Local_Server"
    })
})

gulp.task('watch', ['browserSync', 'default'], function (){
    gulp.watch('src/scss/*.scss', ['default']);
    gulp.watch('terms.html', reload);
});

