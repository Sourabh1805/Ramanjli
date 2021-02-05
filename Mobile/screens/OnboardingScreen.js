import React from 'react';
import { View, Text, Image, TouchableOpacity, StyleSheet } from 'react-native';
import { COLORS, SIZES, FONTS, icons, images } from "../constants"

import Onboarding from 'react-native-onboarding-swiper';


const Dots = ({selected}) => {
    let backgroundColor;

    backgroundColor = selected ? 'rgba(0, 0, 0, 0.8)' : 'rgba(0, 0, 0, 0.3)';

    return (
        <View 
            style={{
                width:6,
                height: 6,
                marginHorizontal: 3,
                backgroundColor
            }}
        />
    );
}

const Skip = ({...props}) => (
    <TouchableOpacity
        style={{marginHorizontal:10}}
        {...props}
    >
        <Text style={[FONTS.h2,{color:COLORS.white}] }>Skip</Text>
    </TouchableOpacity>
);

const Next = ({...props}) => (
    <TouchableOpacity
        style={{marginHorizontal:10}}
        {...props}
    >
        <Text style={[FONTS.h2,{color:COLORS.white}] }>Next</Text>
    </TouchableOpacity>
);

const Done = ({...props}) => (
    <TouchableOpacity
        style={{marginHorizontal:10}}
        {...props}
    >
        <Text style={[FONTS.h2,{color:COLORS.white}] }>Done</Text>
    </TouchableOpacity>
);

const OnboardingScreen = ({navigation}) => {
    return (
        <Onboarding
        SkipButtonComponent={Skip}
        NextButtonComponent={Next}
        DoneButtonComponent={Done}
        DotComponent={Dots}
        onSkip={() => navigation.replace("Home")}
        onDone={() => navigation.replace("LoginScreen")}
        pages={[
          {
            backgroundColor: COLORS.secondary,
            image: 
            
            <Image 
            style = {styles.Image2Container}
            source= {images.logoLarge }/>,
            title: 'Your Dentist at your home!',
            subtitle: 'Book a appointment in 3 clicks',
          },
          {
            backgroundColor: COLORS.secondary,
            image: <Image 
            style = {styles.ImageContainer}
            source={images.ProfileImageReactangle } />,
            title: 'No need to visit Clinic anymore',
            subtitle: 'Book our To-House Appointment',
          },
          {
            backgroundColor: COLORS.secondary,
            image: <Image 
            style = {styles.Image2Container}
            source={images.logoLarge } />,
            title: 'Where dream smile is reality!',
            subtitle: "Ramanjali Clinic",
          },
        ]}
      />

    );
};

export default OnboardingScreen;

const styles = StyleSheet.create({
  container: {
    flex: 1, 
    alignItems: 'center', 
    justifyContent: 'center'
  },
  ImageContainer: {
    width: SIZES.width/1.5, 
    height: SIZES.width/1.5,
    borderWidth: 4, 
    borderColor: COLORS.primary,  
    borderRadius: SIZES.width/1.5
  }, 
  Image2Container: {
    width: 235, 
    height: 200
  }, 
  Image3Container: {
    width: 250, 
    height: 193
  }
});