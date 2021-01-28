import * as React from 'react';
import {NavigationContainer} from '@react-navigation/native';
import {createStackNavigator} from  '@react-navigation/stack';


import OnboardingScreen from './screens/OnboardingScreen';
import LoginScreen from './screens/LoginScreen';
import SignUpScreen from './screens/SignUpScreen';

const Stack = createStackNavigator();

const Navigation = () => {

            return (
                <NavigationContainer>
                <Stack.Navigator initialRouteName="OnboardingScreen" >
                <Stack.Screen name="OnboardingScreen" component={OnboardingScreen} options={{headerShown: false}}/>
                <Stack.Screen name="LoginScreen" component={LoginScreen} options={{headerShown: false}}/>
                <Stack.Screen name="SignUpScreen" component={SignUpScreen} options={{headerShown: false}}/>
                </Stack.Navigator>
                </NavigationContainer>
            );

};

export default Navigation;
