import {StyleSheet} from 'react-native';
import { COLORS, SIZES, FONTS } from "../constants";
const Submitstyles = StyleSheet.create({
    container : {
        backgroundColor: COLORS.primary, 
        width: '50%', 
        height: SIZES.textboxheight,
        borderRadius: SIZES.borderRadius,
        alignItems: 'center',
        justifyContent: 'center', 
          
    }, 
    submitText: {
        fontSize: 22, 
        fontWeight: 'bold', 
        color: 'white', 
        
    }
    }); 
    
export default Submitstyles; 