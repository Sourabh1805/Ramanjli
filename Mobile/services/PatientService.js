import Toast from 'react-native-toast-native';
import { COLORS, SIZES, FONTS, 
    ErrorToaststyle, 
    SuccessToaststyle, 
    InfoToaststyle,
    appConstants } from "../constants";
import {storeData, retrieveData} from '../functions';

export const PatientList = async () => {
    const token = await retrieveData("userToken")
    if(token.code=="404"){
        console.log("404")
    }
    console.log("200")
    console.log(token)
    console.log("200")
    
    try{
                console.log("token")
                console.log(token)
                console.log("token")
                fetch(appConstants.ClientUrL+"/patient", {
                   method: 'GET',
                   mode: "no-cors",
                   headers: {
                       'Accept': 'application/json', 
                       'Content-Type': 'application/json',
                       'Authorization': "Bearer"+" "+token
                   }, 
               }).then(res=>res.json()).then(resData => {
                    console.log("hi")
                    console.log(resData)
                    
                   if(resData.error){
                    Toast.show(resData.error,Toast.SHORT,Toast.TOP,ErrorToaststyle); 
                       return "error"
                   }
                   if(resData['code'] == 200)
                   {
                        return resData
                         
                   }
                       return "hi"
                   })               
    } 
    catch(error)
    {
       return error;
    }
    
};



const PatientService = {PatientList};

export default PatientService;