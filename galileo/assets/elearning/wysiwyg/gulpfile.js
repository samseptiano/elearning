var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var uglify = require('gulp-uglify');
var wrap = require("gulp-wrap");
var LessPluginAutoPrefix = require('less-plugin-autoprefix'),
autoprefix= new LessPluginAutoPrefix({ browsers: ["last 3 versions"] });

gulp.task('less', function () {
  return gulp.src('src/less/jquery.wysiwygEditor.less')
  .pipe(less({
    paths: [ path.join(__dirname, 'less', 'includes') ],
    plugins: [ autoprefix ]
  }))
  .pipe(gulp.dest('dist/css'));
});

gulp.task('minify', function() {
  return gulp.src('dist/js/jquery.wysiwygEditor.js')
  .pipe(gulp.dest('../js/'))
  .pipe(uglify())
  .pipe(wrap('/*\n**\n** jquery.wysiwygEditor.min.js \n**\n*/\n\n<%= contents %>'))
  .pipe(gulp.dest('dist/js/jquery.wysiwygEditor.min.js'));
});
