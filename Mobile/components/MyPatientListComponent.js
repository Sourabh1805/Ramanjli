import React, { Component , useState} from 'react'
import { Text, View } from 'react-native'
import {retrieveData} from '../functions';
import AsyncStorage from '@react-native-async-storage/async-storage';
export default class MyPatientListComponent extends Component {
    constructor(props) { 

        super(props);
    
        this.state = {
          token:"",
          PatientList:[],
        }
        
      }
      
     async componentDidMount() {
          
       const val = await retrieveData("userToken")
        console.log(val)        
      }
    render() {
        return (
            <View>
                <Text> textInComponent </Text>
            </View>
        )
    }
}
