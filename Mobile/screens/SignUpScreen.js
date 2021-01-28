import React, { useState } from 'react';
import {View, StyleSheet, Button,TouchableOpacity, Text, Image, ScrollView } from 'react-native';
import {Input} from 'react-native-elements';
import InputsStyles from '../styles/InputsStyles';
import Icon from 'react-native-vector-icons/FontAwesome';

import Submitstyles from '../styles/Submitstyles';
import { Logoheader } from "../components";
import { COLORS, SIZES, FONTS } from "../constants";
const SignUpScreen = props => {
        const [FullName, setFullName] = useState('');
        const [Email, setEmail] = useState('');
        const [Phonenumber, setPhonenumber] = useState('');
        const [Password, setPassword] = useState('');
        const [CNFPassword, setCNFPassword] = useState('');






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
    
        const signup= ()=>{
            
        }


        
        return (

        <ScrollView style={{backgroundColor: COLORS.secondary}}>
            <View style={styles.container}>
            <View style={styles.categoryIcon}>
            <Logoheader></Logoheader>
          </View>
          <Text style={FONTS.h1}>Create new account</Text>
                <View style={{marginTop: 20}} />
            
                    <View style={[InputsStyles.container]}>
                <Input style={InputsStyles.inputContainer}
                    placeholder= "Full Name"
                    onChangeText={FullName => setFullName(FullName)}

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
                <Input style={InputsStyles.inputContainer}
                    placeholder= "Email"
                    onChangeText={Email => setEmail(Email)}

                    inputContainerStyle={InputsStyles.inputContainer}
                    inputStyle={InputsStyles.inputText}
                    leftIcon= {
                        <Icon 
                            name="envelope"
                            size={SIZES.logoSize}   
                            color={COLORS.black}

                        />
                    }
                />
            </View>

            <View style={[InputsStyles.container]}>
                <Input style={InputsStyles.inputContainer}
                    placeholder= "Phonenumber"
                    onChangeText={Phonenumber => setPhonenumber(Phonenumber)}

                    inputContainerStyle={InputsStyles.inputContainer}
                    inputStyle={InputsStyles.inputText}
                    leftIcon= {
                        <Icon 
                            name="phone"
                            size={SIZES.logoSize}   
                            color={COLORS.black}

                        />
                    }
                />
            </View>

            <View style={[InputsStyles.container]}>
                <Input style={InputsStyles.inputContainer}
                    placeholder= "Password"
                    onChangeText={Password => setPassword(Password)}
                    secureTextEntry={true}

                    inputContainerStyle={InputsStyles.inputContainer}
                    inputStyle={InputsStyles.inputText}
                    leftIcon= {
                        <Icon 
                            name="lock"
                            size={SIZES.logoSize}   
                            color={COLORS.black}
                        />
                    }
                />
            </View>

            <View style={[InputsStyles.container]}>
                <Input style={InputsStyles.inputContainer}
                    placeholder= "Confirm Password"
                    onChangeText={CNFPassword => setCNFPassword(CNFPassword)}
                    secureTextEntry={true}

                    inputContainerStyle={InputsStyles.inputContainer}
                    inputStyle={InputsStyles.inputText}
                    leftIcon= {
                        <Icon 
                            name="lock"
                            size={SIZES.logoSize}   
                            color={COLORS.black}
                        />
                    }
                />
            </View>
            
                       
                <TouchableOpacity style={Submitstyles.container} onPress={signup}>
                    <Text style={Submitstyles.submitText}> Signup </Text>
                </TouchableOpacity>
            <View style={{flexDirection: 'row'}}>
                <Text styles={styles.textBody}> Already have an account? </Text>
                <Text styles={[styles.textBody, {color: '#001F6D'}]}
                 onPress = {()=> props.navigation.navigate('LoginScreen')}>Login here </Text>

            </View>
            </View>

        </ScrollView>
    );
};
export default SignUpScreen;  

const styles = StyleSheet.create({
    container: {
        flex: 1, 
        alignItems: 'center', 
        backgroundColor: COLORS.secondary

    }, 
    image: {
        width: 400, 
        height: 350, 
        marginVertical: 10
    }, 
    textTitle: {
        fontSize: 40, 
        fontFamily: 'Foundation', 
        marginVertical: 5
    }, 
    textBody: {
        fontSize: 16, 
        fontFamily: 'Foundation'
    },
    imageContainer: {
        width: 200, 
        height: 200
    }
});


