import React from 'react';
import {
  View,
  Text,
  Image,
  StyleSheet,
  StatusBar,
  TouchableOpacity,
  ScrollView,
} from 'react-native';


import Swiper from 'react-native-swiper';


import { Card } from 'react-native-elements'; 

import Fontisto from 'react-native-vector-icons/Fontisto';

import FontAwesome5 from 'react-native-vector-icons/FontAwesome5';

import { COLORS, SIZES, FONTS,images } from "../constants";



const HomeScreen = ({navigation}) => {


  return (
    <ScrollView style={styles.container}>
      <StatusBar  />
      <View style={styles.sliderContainer}>
        <Swiper
          autoplay
          horizontal={false}
          height={200}
          activeDotColor="#caf0f8">
          <View style={styles.slide}>
            <Image
              source= {images.visitingCard}
              resizeMode="stretch"
              style={styles.sliderImage}
            />
          </View>
          <View style={styles.slide}>
            <Image
              source={images.visitingCard}
              resizeMode="stretch"
              style={styles.sliderImage}
            />
          </View>
          <View style={styles.slide}>
            <Image
              source={images.visitingCard}
              resizeMode="stretch"
              style={styles.sliderImage}
            />
          </View>
        </Swiper>
      </View>
<Card containerStyle={styles.cardstyle}>
<View>
      <View style={styles.categoryContainer}>
        <TouchableOpacity
          style={styles.categoryBtn}
          onPress={() =>
            navigation.navigate('DiseasePredictionScreen', {title: 'Disease prediction'})
          }>
          <View style={styles.categoryIcon}>
            <FontAwesome5 name="question" size={25} color="#4A7EFB" />
          </View>
          <Text style={styles.categoryBtnTxt}>Predictions</Text>
        </TouchableOpacity>

       
        
        <TouchableOpacity
          style={styles.categoryBtn}
          onPress={() =>
            navigation.navigate('BookAppointment', {title: 'Book A Appointment'})
          }>
          <View style={styles.categoryIcon}>
            <Fontisto
              name="prescription"
              size={25}
              color="#4A7EFB"
            />
          </View>
          <Text style={styles.categoryBtnTxt}>Book Appointment</Text>
        </TouchableOpacity>

        </View>
        <View style={{flexDirection:"row", marginTop:20,marginBottom:20}}>
        <TouchableOpacity
          style={styles.categoryBtn}
          onPress={() =>
            navigation.navigate('MyAppoinment', {title: 'View Appointment History'})
          }>
          <View style={styles.categoryIcon}>
            <FontAwesome5
              name="book-open"
              size={25}
              color="#4A7EFB"
            />
          </View>
          <Text style={styles.categoryBtnTxt}>Appointments</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={styles.categoryBtn}
          onPress={() =>
            navigation.navigate('DoctorProfileScreen', {title: 'My Doctor'})
          }>
          <View style={styles.categoryIcon}>
            <Fontisto
              name="doctor"
              size={25}
              color="#4A7EFB"
            />
          </View>
          <Text style={styles.categoryBtnTxt}>My Doctor</Text>
        </TouchableOpacity>
        </View>
      </View>
      </Card>
    </ScrollView>
  );
};

export default HomeScreen;

const styles = StyleSheet.create({
  container: {
    backgroundColor: "#FFFFFF", 
    flex: 1,
  },
  sliderContainer: {
    height: 200,
    width: '90%',
    marginTop: 10,
    justifyContent: 'center',
    alignSelf: 'center',
  },

  wrapper: {},

  slide: {
    flex: 1,
    justifyContent: 'center',
    backgroundColor: 'transparent',
    borderRadius: 8,
  },
  sliderImage: {
    height: '100%',
    width: '100%',
    alignSelf: 'center',
    borderRadius: 8,
  },
  categoryContainer: {
    flexDirection: 'row',
    width: '100%',
    alignSelf: 'center',
    marginTop: 25,
    marginBottom: 10,
  },
  categoryBtn: {
    flex: 1,
    width: '30%',
    marginHorizontal: 0,
    alignSelf: 'center',
  },
  categoryIcon: {
    borderWidth: 0,
    alignItems: 'center',
    justifyContent: 'center',
    alignSelf: 'center',
    width: 70,
    height: 70,
    backgroundColor: '#FFFFFF' /* '#FF6347' */,
    borderRadius: 50,
  },
  categoryBtnTxt: {
    alignSelf: 'center',
    marginTop: 5,
    color: '#FFFFFF',
  },
  cardsWrapper: {
    marginTop: 20,
    width: '90%',
    alignSelf: 'center',
  },
  card: {
    height: 100,
    marginVertical: 10,
    flexDirection: 'row',
    shadowColor: '#999',
    shadowOffset: {width: 0, height: 1},
    shadowOpacity: 0.8,
    shadowRadius: 2,
    elevation: 5,
  },
  cardImgWrapper: {
    flex: 1,
  },
  cardImg: {
    height: '100%',
    width: '100%',
    alignSelf: 'center',
    borderRadius: 8,
    borderBottomRightRadius: 0,
    borderTopRightRadius: 0,
  },
  cardInfo: {
    flex: 2,
    padding: 10,
    borderColor: '#ccc',
    borderWidth: 1,
    borderLeftWidth: 0,
    borderBottomRightRadius: 8,
    borderTopRightRadius: 8,
    backgroundColor: '#fff',
  },
  cardTitle: {
    fontWeight: 'bold',
  },
  cardDetails: {
    fontSize: 12,
    color: '#444',
  },
  cardstyle: {
    backgroundColor: "#4A7EFB", 
    borderRadius: 30,
  }
});