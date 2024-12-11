import { StatusBar } from "expo-status-bar";
import React, { useEffect, useState } from "react";
import { StyleSheet, Text, View } from "react-native";
import NavigationBar from "./components/NavigationBar";
import BodyContainer from "./components/BodyContainer";



export default function App() {
  
  return (
    <View style={styles.container}>
      <NavigationBar />
      <BodyContainer />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    rowGap: 15,
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
  },
});
