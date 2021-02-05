import React, { useState } from 'react';
import {View, StyleSheet,Button, Text,  Image, ScrollView, TouchableOpacity} from 'react-native';
import Icon from 'react-native-vector-icons/FontAwesome';
import {Input} from 'react-native-elements';
import Submitstyles from '../styles/Submitstyles';
import InputsStyles from '../styles/InputsStyles';

import {storeData,retrieveData} from '../functions';

import Toast from 'react-native-toast-native';
import { COLORS, SIZES, FONTS, ErrorToaststyle, SuccessToaststyle, InfoToaststyle,appConstants } from "../constants";

import { Logoheader } from "../components";
import { emailValidator,passwordValidator,UserNameValidator } from "../validation/Validation";
import DateTimePicker from '@react-native-community/datetimepicker';

const AddPatient = props => {
    const [UserName, setUserName] = useState({ value: '', error: '' })
    const [Patient_dob, setPatient_dob] = useState({ value: new Date(1598051730000), error: '' })
    const [Gender, setGender] = useState({ value: '', error: '' })

    const ValidateUserName = (text) =>{
        
        const UserNameError = UserNameValidator(text)
    
        if (passwordError) {
            setUserName({ value:text, error: UserNameError })
            return
        }
        else  {
            setUserName({ value:text, error: "" })
            return
        }
    }

    const ValidateEmail = (text) =>{
        const emailError = emailValidator(text)
        if (emailError) {
            setEmail({ value:text, error: emailError })
            return
        }
        else{
            setEmail({ value:text, error: "" })
            return
        }
    }

async function login2(){
    try{
    
            fetch(appConstants.ClientUrL+"/loginapi", {
               method: 'POST', 
               mode: "no-cors", 
    
               headers: {
                   'Accept': 'application/json', 
                   'Content-Type': 'application/json'
               }, 
    
               body: JSON.stringify({
                   "email" : Email.value, 
                   "password" : Password.value, 
                   "device_name": "react-app", 
               })
           }).then(res=>res.json()).then(resData => {
                console.log("hi")
                console.log(resData)
                
               if(resData.error){
                console.log("hi")
                console.log(resData.error)
                Toast.show(resData.error,Toast.SHORT,Toast.TOP,ErrorToaststyle); 
                   return
               }
               if(resData['code'] == 200)
               {
                storeData('userToken',resData['token']).then(resData2 => {
                        console.log(resData2)
                        console.log("sucess")
                        console.log(resData['token'])
                        Toast.show("Succesfully Loged in",Toast.SHORT,Toast.TOP,SuccessToaststyle); 
                        console.log("sucess")
                        console.log(retrieveData('Token'))
                        console.log("sucess")
                        props.navigation.replace("Home")
                    }
                    )
                    
                     
               }
                   
               })
              
               
           } 
        catch(error)
        {
            alert(error); 
        }
}

    return (
        <ScrollView style={{backgroundColor: COLORS.secondary}}>
            <View style={styles.container}>
            
                <Logoheader></Logoheader>
           
                <Text style={FONTS.h1}>Add Patient</Text>
         
                <View style={{marginTop: 20}} />


                <View style={[InputsStyles.container]}>
                    <Input style={InputsStyles.inputContainer}
                        onChangeText={(text) => ValidateUserName(text)}
                        errorStyle={{ color: COLORS.primary }}
                        error={!!UserName.error}
                        errorMessage={UserName.error}
                        inputContainerStyle={InputsStyles.inputContainer}
                        placeholder="userName"
                        inputStyle={InputsStyles.inputText}
                        leftIcon= {
                            <Icon 
                                name="user"
                                size={SIZES.IconSize}  
                                color={COLORS.black}
                            
                            />
                        }
                    />
                </View>



               
            
           
                <View style={{width: '90%', margin: 5, marginBottom: 5}}>
                    <Text style={[styles.textBody], {alignSelf: 'flex-end',color:COLORS.TextColor}}>Forgot Password?</Text>
                </View>

                <TouchableOpacity style={Submitstyles.container} onPress={login2}>
                    <Text style={Submitstyles.submitText}> Log In </Text>
                </TouchableOpacity>
                <View style={{flexDirection: 'row', marginVertical: 5}}>
                    <Text style={[styles.textBody, {fontFamily: 'DM Sans'}]}>Don't Have an account ?</Text>
                    <Text style={[styles.textBody, {color:COLORS.TextColor, fontFamily: 'DM Sans'}]}
                     onPress={() => props.navigation.navigate('SignUpScreen')}> Create New
                     </Text>
                </View>
            </View>
        </ScrollView>      
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center',
        backgroundColor: COLORS.secondary, 
        justifyContent: 'center', 
    },
    
    textTitle: {
        fontFamily: 'DM Sans',
        fontSize: 35,
        padding: 8
    },
    textBody: {
        fontFamily: 'DM Sans',
        fontSize: 15, 
        padding: 8,
    }, 
   
});

export default AddPatient;