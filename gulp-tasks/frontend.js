'use strict';

const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const rigger = require('gulp-rigger');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify');
const watch = require('gulp-watch');
const del = require('del');
const rename = require('gulp-rename');
const gulpIf = require('gulp-if');
const minimist = require('minimist');
const imagemin = require('gulp-imagemin');


const knownOptions = {
  string: 'env',
  default: { env: process.env.NODE_ENV || 'development' }
};

const options = minimist(process.argv.slice(2), knownOptions);

const path = {
    build: {
        js: 'frontend/web/js/',
        css: 'frontend/web/css/',
        img: 'frontend/web/css/images/',
        fonts: 'frontend/web/fonts/'
    },
    src: {
        js: 'frontend/assets/js/[^_]*.js',
        scss: 'frontend/assets/css/scss/[^_]*.scss',
        img: 'frontend/assets/css/images/**/*.*',
        fonts: 'frontend/assets/fonts/**/*.*'
    },
    watch: {
        js: 'frontend/assets/js/**/*.js',
        css: 'frontend/assets/css/**/*.*',
        img: 'frontend/assets/css/images/**/*.*',
        fonts: 'frontend/assets/fonts/**/*.*'
    },
    clean: [
        'frontend/web/js/**/*',
        'frontend/web/css/**/*',
        'frontend/web/fonts/**/*'
    ] //директории которые могут очищаться
};


gulp.task('frontend:js:build', function () {
    return gulp.src(path.src.js) //Найдем наш main файл
        .pipe(rigger()) //Прогоним через rigger
        //.pipe(sourcemaps.init()) //Инициализируем sourcemap
        .pipe(uglify()) //Сожмем наш js
        .pipe(gulpIf(options.env === 'development', sourcemaps.write())) //Пропишем карты
        .pipe(rename({suffix: '.min'})) //добавим суффикс .min к выходному файлу
        .pipe(gulp.dest(path.build.js)); //выгрузим готовый файл в build
});

gulp.task('frontend:css:build', function () {
    return gulp.src(path.src.scss) //Выберем наш main.scss
        //.pipe(sourcemaps.init()) //То же самое что и с js
        .pipe(sass()) //Скомпилируем
        .pipe(autoprefixer()) //Добавим вендорные префиксы
        .pipe(cleancss({
            inline: ['local'],
            rebase: false
        })) //Сожмем
        .pipe(gulpIf(options.env === 'development', sourcemaps.write()))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.build.css)); //И в build
});

gulp.task('frontend:image:build', function () {
    return gulp.src(path.src.img) //Выберем наши картинки
        .pipe(imagemin({ //Сожмем их
            progressive: true, //сжатие .jpg
            svgoPlugins: [{removeViewBox: false}], //сжатие .svg
            //use: [pngquant()],
            interlaced: true, //сжатие .gif
            optimizationLevel: 3 //степень сжатия от 0 до 7
        }))
        .pipe(gulp.dest(path.build.img)); //выгрузим в build
});

gulp.task('frontend:fonts:build', function() {
    return gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts)); //выгружаем в build
});

gulp.task('frontend:clean', function () {
    return del(path.clean);
});

gulp.task('frontend:build', gulp.series(
  'frontend:js:build',
  'frontend:css:build',
  'frontend:fonts:build',
  'frontend:image:build'
));
