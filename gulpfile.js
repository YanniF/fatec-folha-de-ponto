var gulp = require('gulp'),
		sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer');
    
gulp.watch("resources/assets/scss/*.scss", ['sass']);

gulp.task('sass', function() {
	return sass('resources/assets/scss/*.scss', {
		noCache: true,
		style: 'compressed' 
	})
	.on('error', sass.logError)
	.pipe(autoprefixer({
    browsers: ['last 3 versions', '> 5%'],
    cascade: false
  }))
	.pipe(gulp.dest('public/css/')); 
});

gulp.task('default', ['sass']);