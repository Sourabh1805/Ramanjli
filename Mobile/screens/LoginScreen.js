import React, { useState } from 'react';
import {View, StyleSheet,Button, Text,  Image, ScrollView, TouchableOpacity} from 'react-native';
import Icon from 'react-native-vector-icons/FontAwesome';
import {Input} from 'react-native-elements';
import Submitstyles from '../styles/Submitstyles';
import InputsStyles from '../styles/InputsStyles';



import { COLORS, SIZES, FONTS } from "../constants";
import { Logoheader } from "../components";
import { emailValidator,passwordValidator } from "../validation/Validation";
import { authServices } from "../src/services/authServices";

const LoginScreen = props => {
    const [Email, setEmail] = useState({ value: '', error: '' })
    const [Password, setPassword] = useState({ value: '', error: '' })

    const ValidatePassword = (text) =>{
        
        const passwordError = passwordValidator(text)
    
        if (passwordError) {
            setPassword({ ...Password, error: passwordError })
            return
        }
        else  {
            setPassword({ ...Password, error: "" })
            return
        }
    }

    const ValidateEmail = (text) =>{
        const emailError = emailValidator(text)
        if (emailError) {
            setEmail({ ...Email, error: emailError })
            return
        }
        else{
            setEmail({ ...Email, error: "" })
            return
        }
    }

  const login= ()=>{
        data={
            Email: Email,
            Password:Password
        }
        authServices.login(data)

    }

    return (
        <ScrollView style={{backgroundColor: COLORS.secondary}}>
            <View style={styles.container}>
            
                <Logoheader></Logoheader>
           
                <Text style={FONTS.h1}>Welcome back</Text>
                <Text style={FONTS.h2}>Log in to your existing account</Text>
                <View style={{marginTop: 20}} />


                <View style={[InputsStyles.container]}>
                    <Input style={InputsStyles.inputContainer}
                        onChangeText={(text) => ValidateEmail(text)}
                        errorStyle={{ color: COLORS.primary }}
                        error={!!Email.error}
                        errorMessage={Email.error}
                        inputContainerStyle={InputsStyles.inputContainer}
                        inputStyle={InputsStyles.inputText}
                        leftIcon= {
                            <Icon 
                                name="user"
                                size={SIZES.logoSize}  
                                color={COLORS.black}
                            
                            />
                        }
                    />
                </View>
            
            <View style={[InputsStyles.container]}>
                <Input 
                    inputContainerStyle={InputsStyles.inputContainer}
                    inputStyle={InputsStyles.inputText}
                    onChangeText={(text) => ValidatePassword(text)}
                    errorStyle={{ color: COLORS.primary }}
                    error={!!Password.error}
                    errorMessage={Password.error}
                    secureTextEntry={true}
                    leftIcon= {
                        <Icon 
                            name= "lock"
                            size={SIZES.logoSize}   
                            color={COLORS.black}
                        />
                    }
                />
            </View>
                <View style={{width: '90%', margin: 5, marginBottom: 5}}>
                    <Text style={[styles.textBody], {alignSelf: 'flex-end',color:COLORS.white}}>Forgot Password?</Text>
                </View>

                <TouchableOpacity style={Submitstyles.container} onPress={login}>
                    <Text style={Submitstyles.submitText}> Log In </Text>
                </TouchableOpacity>
                <View style={{flexDirection: 'row', marginVertical: 5}}>
                    <Text style={[styles.textBody, {fontFamily: 'DM Sans'}]}>Don't Have an account ?</Text>
                    <Text style={[styles.textBody, {color:COLORS.white, fontFamily: 'DM Sans'}]}
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
    image: {
        width: "50%",
        height: "50%",
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
    imageContainer: {
        marginTop: 20, 
        width: 250, 
        height: 250
    }
});

export default LoginScreen;