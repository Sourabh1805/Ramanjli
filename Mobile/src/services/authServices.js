import { appConstants } from "../../constants";
import AsyncStorage from '@react-native-async-storage/async-storage';

export function login(data) {
    try{
        console.log("login")
        console.log(data)
        console.log("login")
         fetch(appConstants.ClientUrL+"/loginapi", {
            method: 'POST', 
            mode: "no-cors", 

            headers: {
                'Accept': 'application/json', 
                'Content-Type': 'application/json'
            }, 

            body: JSON.stringify({
                "email" : data.Email, 
                "password" : data.Password, 
                "device_name": "react-app", 
            })
        }).then(res=>res.json()).then(resData => {
            if(resData['errors']){
                console.log("return")
                console.log(resData['errors'])
                return resData['errors']
            }
            if(resData['code'] == 200)
            {
                
                try {
                        AsyncStorage.setItem('userToken',resData['token'] )
                        console.log("sucess login")
                        return resData['code']
                    } catch (e) {
                        
                }
            
                
            }
                
            })
           
            
        } 
        catch(error)
        {
            alert(error); 
        }
}


export function passwordValidator(password) {
  
    if (!password || password.length <= 0) return "Password can't be empty."
    if (password.length < 8) return "Password can't be less than 8 ."
    return ''
  }

const authServices = { login, passwordValidator};

export default authServices;