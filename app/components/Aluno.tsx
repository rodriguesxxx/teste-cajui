import { logout } from "@/api/auth";
import { RootStackParamList } from "@/types/navigation";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { NavigationProp, useNavigation } from "@react-navigation/native";
import { Alert, Image, StyleSheet, Text, View } from "react-native";
import { Button } from "react-native-paper";
import { Card } from "./Card";

export function Aluno() {
    const navigation = useNavigation<NavigationProp<RootStackParamList>>();

    const handleLogout = async () => {
        try {
            await logout();
            await AsyncStorage.removeItem("token");
        } catch (e) {
            Alert.alert("Erro", "Erro ao efetuar logout.");
        } finally {
            navigation.navigate("login");
        }
    };

    return (
        <View>
            <Card title='Informações do aluno'>
                <View style={styles.profile}>
                    <Image style={{ width: 150, height: 150 }} source={require(".././assets/images/profile.jpg")} />
                </View>
                <Text style={{ textAlign: "center", fontWeight: "bold", fontSize: 18, marginBottom: 5 }}>
                    Daniel Rodrigues
                </Text>
                <Text style={{ textAlign: "center", marginBottom: 5 }}>
                    <Text style={{ fontWeight: "bold" }}>Matricula: </Text>
                    <Text>123456</Text>
                </Text>
                <Button
                    icon='pencil'
                    mode='contained'
                    onPress={() => console.log("open modal")}
                    buttonColor='#007BFF'
                    style={{ marginBottom: 5 }}>
                    Atualizar
                </Button>
                <Button icon='logout' mode='contained' onPress={handleLogout} buttonColor='#d32f2f'>
                    Sair
                </Button>
            </Card>
        </View>
    );
}

const styles = StyleSheet.create({
    profile: { justifyContent: "center", alignItems: "center" },
});
