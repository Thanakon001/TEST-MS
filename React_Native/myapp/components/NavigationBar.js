import { Image, StyleSheet, Text, View } from "react-native";

export default function NavigationBar() {
  return (
    <View style={style.container}>
      <Image style={style.image} source={require('../assets/list.png')} />
      <Text style={style.text}>ห้องสมุด</Text>
      <Image style={style.image} source={require('../assets/user.png')} />
    </View>
  );
}

const style = StyleSheet.create({
  container: {
    padding: 15,
    width: "100%",
    height: 75,
    justifyContent: "space-between",
    alignItems: "center",
    flexDirection: "row",
    backgroundColor: "#ec4899",
  },
  text: {
    marginTop:'auto',
    color: "#fdf2f8",
  },
  image: {
    marginTop:'auto',
    width: 30,
    height: 30,
  },
});
