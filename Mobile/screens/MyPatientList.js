import React, { useEffect, useState } from 'react';
import {View, StyleSheet,Button, Text,  Image, ScrollView, TouchableOpacity} from 'react-native';
import { PatientList } from '../services/PatientService';
import Toast from 'react-native-toast-native';
import { COLORS, SIZES, FONTS, ErrorToaststyle, SuccessToaststyle, InfoToaststyle,appConstants } from "../constants";

const MyPatientList = props => {
  const [list, setList] = useState([]);

  useEffect(() => {
   let mounted = true;
   PatientList().then(items => {
       if(mounted) {
         setList(items)
         console.log("items")
       }
     })
   return () => mounted = false;
 }, [])

  return(
    <ScrollView style={{backgroundColor: COLORS.secondary}}>
      <View style={styles.container}>
          
          <View>
            <View style={styles.cardContainer}>
              <TouchableOpacity style={styles.card}   onPress={() =>
              props.navigation.navigate('AddPatient')}>
              <Text>add</Text>
              </TouchableOpacity>

              <TouchableOpacity style={styles.card}>
              <Text>card</Text>
              </TouchableOpacity>
            </View>
          </View>
         
      </View>
    </ScrollView>
  )
}

export default MyPatientList;


const styles = StyleSheet.create({
  container: {
      flex: 1,
      alignItems: 'center',
      backgroundColor: COLORS.secondary, 
      justifyContent: 'center', 
  },
  card:{
    alignItems: 'center',
    backgroundColor: COLORS.Success, 
    justifyContent: 'center', 
    marginHorizontal:5,
    width:SIZES.width/2-20,
    height:SIZES.height/3,
    marginTop:20

  },
  cardContainer:{
    flex: 1,
    flexDirection:"row"
  }
})