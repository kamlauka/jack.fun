var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
// var cssnano = require('gulp-cssnano'); // Подключаем пакет для минификации CSS
// var rename = require('gulp-rename');


gulp.task('default', function () {
    return gulp.src('public_html/template/src/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        // .pipe(cssnano()) // Сжимаем
        // .pipe(rename({suffix: '.min'})) // Добавляем суффикс .min
        .pipe(gulp.dest('public_html/template/dist/css'))
        .pipe(gulp.dest('public_html/frontend/web/css'))
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
        host: 'jackpot.fun',
        port: 'http://jackpot.fun/',
        logPrefix: "My_Local_Server"
    })
})

gulp.task('watch', ['browserSync', 'default'], function (){
    gulp.watch('public_html/template/src/scss/*.scss', ['default']);
    gulp.watch('public_html/template/dist/prizes.html', reload);
});
