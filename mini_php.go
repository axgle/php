package main
import "fmt"
import "os"
import "os/exec"
func main(){
   os.Setenv("PHPRC",``) //unset default php.ini's loadPath if user set it in ENV
   fmt.Println(os.Getenv("PHPRC")) 
  b,_:=exec.Command("mini_php/php.exe",
  "-r",`echo ini_get('extension_dir');`,
  
  ).Output()
  fmt.Println(string(b))
  
}  