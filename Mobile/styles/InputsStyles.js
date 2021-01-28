import {StyleSheet} from 'react-native';
import { COLORS, SIZES, FONTS, icons, images } from "../constants"

const InputsStyles = StyleSheet.create({
    container: {
        width: '80%',
        height: SIZES.textboxheight,
        borderRadius: SIZES.borderRadius,
        borderColor: COLORS.primary, 
        marginVertical: 10,
        borderWidth: 2, 
    },
    inputContainer: {
        borderBottomWidth: 0
    },
    inputText: {
        fontFamily: 'DM Sans',
        color: COLORS.white,
        fontWeight: 'bold',
        marginLeft: 10
    }
});

export default InputsStyles;
