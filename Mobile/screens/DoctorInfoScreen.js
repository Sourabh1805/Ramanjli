import React, { useState } from 'react';
import {View, StyleSheet, Button,TouchableOpacity, Text, Image, ScrollView, Linking } from 'react-native';
import ColorFont from "../styles/ColorFont"; 
import Submitstyles from "../styles/Submitstyles"; 

import makecall from "../functions/makecall";


import { COLORS, SIZES, FONTS,images } from "../constants";

const DoctorInfoScreen = props => {
   
  
       return(
       
      
          
          <ScrollView style={{backgroundColor: COLORS.secondary}}> 
            <View style={styles.container}>
            <View style={styles.cardContainer}>
            <Image style={styles.preview} source={images.ProfileImageReactangle}/>
              <Text style={ColorFont.heading}> Dr. Anudeep Myakal </Text>
              <Text style={[ColorFont.Paragraph, {color: "#fff"}]}> 
              (B. D. S. Degree)        
              </Text>
      
              <Text style={ColorFont.SubParagraph}> 
              Cosmetic and Craniofacial Aesthetics       
              </Text>
              <Text style={ColorFont.SubParagraph}> 
              Advanced Aesthetic Dentistry (Japan)
              </Text>
              <Text style={ColorFont.SubParagraph}> 
              Digital Smile Designer       
              </Text> 
      
            <TouchableOpacity 
            onPress = {makecall}
            style={[Submitstyles.container, {
              marginTop: 15, width: '80%', backgroundColor: "#fff"}]}>
              <Text style={[Submitstyles.submitText, {color: "#EF4B49"}]}> 
              Call my clinic
              </Text> 
              </TouchableOpacity>
              
            <TouchableOpacity 
            onPress={() => Linking.openURL('mailto:anumyakal@gmail.com') }
            
            style={[Submitstyles.container, {
              marginTop: 15, width: '80%', backgroundColor: "#fff"}]}>
              <Text style={[Submitstyles.submitText, {color: "#EF4B49"}]}> 
              Send a email
              </Text> 
              </TouchableOpacity>

              
      
            </View>
          </View>
          </ScrollView>
       
       
    );
};
export default DoctorInfoScreen;  

const styles = StyleSheet.create({
    container: {
      flex: 1, 
      alignItems: 'center', 
      justifyContent: "center", 
      marginBottom:SIZES.ScreenBottomMargin,
    }, 
    cardContainer: {
      marginTop: 10,
      height: "100%", 
      width: "100%", 
      alignItems: "center", 
      justifyContent: "center", 
    }, 
    preview: {
      width: 150, 
      height: 150, 
      borderRadius: 180, 
      borderWidth: 3, 
      borderColor: "#fff"
    }, 
    logopreview: {
      width: 100, 
      height: 100, 
      borderRadius: 150, 
      borderWidth: 3, 
      borderColor: "#fff", 
      alignItems: 'flex-start', 
      backgroundColor: "#fff"
    }, 
    heading: {
      marginTop: 15, 
      fontSize: 25, 
      color: "#fff"
    }, 
    subheading: {
      marginTop: 15, 
      fontSize: 20, 
      color: "#fff"    
    }, 
    clinicsection: {
      alignItems: "flex-start", 
      justifyContent: "flex-start"
    }, 
    fulllogopreview:{
      marginVertical:20,
      
    },
    ImgContainer:{
      borderRadius:30,
      width:"90%",
      marginVertical:10,
      backgroundColor: "#fff",
      alignItems: "center", 
      justifyContent: "center", 
      borderColor: "#fff"
    
    }
  
  });


