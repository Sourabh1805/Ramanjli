import React, { Component } from 'react';
import {  View,StyleSheet,Image } from 'react-native';
import { COLORS, SIZES, FONTS, icons, images } from "../constants";

export default class Logoheader extends Component {
    render() {
        return (
            <View style={styles.container}>
                <Image source={images.logoMedium}/>
            </View>
        )
    }
}
const styles = StyleSheet.create({
    container:{
        marginVertical:10
    }
})