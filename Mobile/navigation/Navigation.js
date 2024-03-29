import * as React from 'react';
import {NavigationContainer} from '@react-navigation/native';
import {createStackNavigator} from  '@react-navigation/stack';


import OnboardingScreen from '../screens/OnboardingScreen';
import LoginScreen from '../screens/LoginScreen';
import SignUpScreen from '../screens/SignUpScreen';
import AddPatient from '../screens/AddPatient';

import Tabs from "./tabs";
const Stack = createStackNavigator();

const Navigation = () => {

            return (
                <NavigationContainer>
                <Stack.Navigator initialRouteName="OnboardingScreen" >
                <Stack.Screen name="OnboardingScreen" component={OnboardingScreen} options={{headerShown: false}}/>
                <Stack.Screen name="LoginScreen" component={LoginScreen} options={{headerShown: false}}/>
                <Stack.Screen name="SignUpScreen" component={SignUpScreen} options={{headerShown: false}}/>
                <Stack.Screen name="Home" component={Tabs} options={{headerShown: false}}/>
                <Stack.Screen name="AddPatient" component={AddPatient} options={{headerShown: false}}/>
                </Stack.Navigator>
                </NavigationContainer>
            );

};

export default Navigation;
