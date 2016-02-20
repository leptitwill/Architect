var gulp      = require('gulp'),
    rename    = require('gulp-rename'),     // Renommage des fichiers
    sass      = require('gulp-sass'),       // Conversion des SCSS en CSS
    minifyCss = require('gulp-minify'), // Minification des CSS
    uglify    = require('gulp-uglify'),     // Minification/Obfuscation des JS
    plumber   = require('gulp-plumber'),    // Ne pas s'arrêter en cas d'erreurs
    autoprefixer = require('gulp-autoprefixer'); // Ajoute autoprefixer
    
    
// SCSS TASK
gulp.task('sass', function() 
{
  gulp.src('assets/sass/main.scss')    // Prend en entrée les fichiers *.scss
    .pipe(plumber())
    .pipe(sass())                      // Compile les fichiers
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 6', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(minifyCss())                 // Minifie le CSS qui a été généré
    .pipe(gulp.dest('./assets/css/'));  // Sauvegarde le tout dans /style
});

// JAVASCRIPT TASK
gulp.task('js-uglify', function() 
{
  gulp.src('./js/*.src.js')    // Prend en entrée les fichiers *.src.js
    .pipe(plumber())
    .pipe(rename(function(path){
      // Il y a différentes méthodes pour renommer les fichiers
      // Voir ici pour plus d'infos : https://www.npmjs.org/package/gulp-rename
      path.basename = path.basename.replace(".src", ".min");
    }))
    .pipe(uglify())
    .pipe(gulp.dest('./js/'));
});


// WATCH TASK
gulp.task('watch', function() 
{
  //gulp.watch('./assets/sass/*.scss', ['css']);
  gulp.watch('./js/*.src.js', ['js-uglify']);
  gulp.watch('assets/sass/*.scss', ['sass']);
});


gulp.task('default', ['watch']);