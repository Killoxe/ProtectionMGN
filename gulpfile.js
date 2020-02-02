'use strict';

const gulp = require('gulp');
const requireDir = require('require-dir');
requireDir('./gulp-tasks');

gulp.task('default', gulp.series(
  'frontend:clean',
  'frontend:build'
));