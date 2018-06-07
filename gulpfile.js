var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

gulp.task('default', function () {
    return gulp.src('public_html/template/src/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('public_html/template/dist/css'))
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
    gulp.watch('public_html/template/src/scss/*.scss', ['default']);
    gulp.watch('public_html/template/dist/prizes.html', reload);
});

