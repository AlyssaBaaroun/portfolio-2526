import{defineConfig} from "vite";
import{globSync} from "glob";
import fs from "fs";

export default defineConfig({
    base: '/wp-content/themes/portfolio/public/',
    plugins: [
        {
      name: 'bundle-js',
      buildSart(){
          // récupère tous les fichiers JS dans le dossier spécifié
          const files = globSync('./wp-content/themes/portfolio/assets/js/app/*.js');


          // fusionner tous les fichiers dans un seul fichier
          const combinedJs = files.map(file => fs.readFileSync(file, 'utf-8')).join('\n');



          // créer un fichier combiné dans le fichier main.js
          fs.writeFileSync('./wp-content/themes/portfolio/assets/js/main.js', combinedJs)


      }
        }
    ],



    build:{
        manifest: true,
        rollupOptions:{
            input:{
                js: './wp-content/themes/portfolio/assets/js/app.js',
                scss: './wp-content/themes/portfolio/assets/css/styles.scss',
            },
            output: {
                dir: './wp-content/themes/portfolio/public'
            }
        },
        assetsInlineLimit: 0,
        target: ["es2015"]
    }
})