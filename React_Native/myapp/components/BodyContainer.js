import { useEffect, useState } from "react";
import * as SQLite from "expo-sqlite";

import {
  Image,
  ScrollView,
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  View,
} from "react-native";

export default function BodyContainer() {
  const [book, setBook] = useState(null);
  const [content, setContent] = useState("all");
  const [keyword, setKeyword] = useState("");

  const CreateTable = async () => {
    const db = await SQLite.openDatabaseAsync("db_library");
    await db.execAsync(`
      PRAGMA journal_mode = WAL;
      CREATE TABLE IF NOT EXISTS tb_book (
        b_id TEXT NOT NULL PRIMARY KEY,
        b_name TEXT NOT NULL,
        b_writer TEXT,
        b_category TEXT NOT NULL,
        b_price REAL
      );
      `);
  };

  const SetDataTable = async () => {
    let allRows;

    const db = await SQLite.openDatabaseAsync("db_library");
    if (content === "all") {
      allRows = await db.getAllAsync(
        `SELECT * FROM tb_book WHERE b_id LIKE ? OR b_name LIKE ? OR b_writer LIKE ?`,
        [`%${keyword}%`, `%${keyword}%`, `%${keyword}%`]
      );
      setKeyword("");
    } else {
      allRows = await db.getAllAsync(
        `SELECT * FROM tb_book WHERE ${content} LIKE ?`,
        [`%${keyword}%`]
      );
    }

    if (allRows.length > 0) {
      setBook(allRows);
    } else {
      setBook(null);
      db.execAsync(
        `INSERT INTO tb_book (b_id, b_name, b_writer, b_category, b_price) VALUES
        ('B00001', 'คู่มือดารสอบรับราชการ', 'สมศักดิ์ ตั้งใจ', '1', 325),
        ('B00002', 'แฮร์รี่ พอตเตอร์', 'J.K Rowling', '2', 359),
        ('B00003', 'เย็บ ปัก ถักร้อย', 'สะอาด อิ่มสุข', '3', 249),
        ('B00004', 'เจ้าชายน้อย', 'อ็องตวน เดอ แซ็ง', '2', 355),
        ('B00005', 'การเขียนโปรแกรมคอมพิวเตอร์', 'กิ่งแก้ว กลิ่นหอม', '1', 329);`
      );
    }
  };

  const handleSubmit = async () => {
    await SetDataTable();
  };

  useEffect(() => {
    CreateTable();
    SetDataTable();
  }, [content]);

  return (
    <View style={styles.container}>
      <View style={styles.boxSearch}>
        <Image
          style={styles.ImageSearch}
          source={require("../assets/search.png")}
        />
        <TextInput
          style={styles.TextInput}
          placeholder="กรุณากรอกสิ่งที่ต้องการค้นหา"
          placeholderTextColor="#831843"
          onSubmitEditing={handleSubmit}
          value={keyword}
          onChangeText={setKeyword}
        />
      </View>

      <View style={styles.boxTabBar}>
        {buttonContent &&
          buttonContent.map((item, i) => (
            <TouchableOpacity
              key={i}
              onPress={() => setContent(item.values)}
              style={
                content === item.values
                  ? styles.boxTabBarActive
                  : styles.boxTabBarNone
              }
            >
              <Text
                style={
                  content === item.values
                    ? styles.textTabBarActive
                    : styles.textTabBar
                }
              >
                {item.text}
              </Text>
            </TouchableOpacity>
          ))}
      </View>

      <View style={styles.boxItem}>
        <ScrollView>
          {book != null ? (
            book?.map((item) => {
              let category;
              switch (item.b_category) {
                case "1":
                  category = "วิชาการ";
                  break;
                case "2":
                  category = "วรรณกรรม";
                  break;
                case "3":
                  category = "เบ็ตเล็ต";
                  break;
                default:
                  break;
              }
              return (
                <View style={styles.boxItemList} key={item.b_id}>
                  <Text>รหัสหนังสือ :{item.b_id}</Text>
                  <Text>ชื่อหนังสือ :{item.b_name}</Text>
                  <Text>นักเขียน :{item.b_writer}</Text>
                  <Text>หมวดหมู่ :{category}</Text>
                  <Text>ราคา :{item.b_price}</Text>
                </View>
              );
            })
          ) : (
            <View style={styles.boxItemListNone}>
              <Text>ไม่พบข้อมูลที่คุณค้นหา</Text>
              <Text>กรุณาลองค้นหาใหม่อีกครั้ง</Text>
            </View>
          )}
        </ScrollView>
      </View>
    </View>
  );
}

const buttonContent = [
  {
    text: "ทั้งหมด",
    values: "all",
  },
  {
    text: "รหัสหนังสือ",
    values: "b_id",
  },
  {
    text: "ชื่อเรื่อง",
    values: "b_name",
  },
  {
    text: "นักเขียน",
    values: "b_writer",
  },
];

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    rowGap: 5,
  },
  boxSearch: {
    gap: 5,
    padding: 5,
    flexDirection: "row",
    alignItems: "center",
    width: "100%",
  },
  boxTabBar: {
    width: "100%",
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    padding: 10,
  },
  boxTabBarActive: {
    padding: 10,
    borderRadius: 5,
    backgroundColor: "#f472b6",
  },
  boxTabBarNone: {
    padding: 10,
    borderRadius: 5,
  },
  textTabBarActive: {
    color: "#fdf2f8",
    fontSize: 17,
  },
  textTabBar: {
    color: "#be185d",
    fontSize: 17,
  },
  ImageSearch: {
    width: 35,
    height: 35,
  },
  TextInput: {
    width: "75%",
    height: 45,
    color: "#500724",
    paddingHorizontal: 10,
    backgroundColor: "#fce7f3",
    borderRadius: 5,
  },
  boxItem: {
    gap: 15,
    flex: 1,
    padding: 15,
    backgroundColor: "#fdf2f8",
    flexDirection: "row",
  },
  boxItemList: {
    marginTop: 15,
    width: "100%",
    height: 130,
    backgroundColor: "#fff",
    borderRadius: 10,
    padding: 15,

    shadowColor: "#000",
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.25,
    shadowRadius: 3.84,

    elevation: 5,
  },

  boxItemListNone: {
    marginTop: 15,
    width: "100%",
    height: 130,
    backgroundColor: "#fff",
    borderRadius: 10,
    padding: 15,
    justifyContent: "center",
    alignItems: "center",

    shadowColor: "#000",
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.25,
    shadowRadius: 3.84,

    elevation: 5,
  },
});
