import { logout } from "@/api/auth";
import { getInfoAluno } from "@/api/aluno";
import { InfoAlunoType } from "@/types/aluno";
import { RootStackParamList } from "@/types/navigation";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { NavigationProp, useNavigation } from "@react-navigation/native";
import { useEffect, useState } from "react";
import { Image, StyleSheet, Text, View } from "react-native";
import { Button } from "react-native-paper";
import { Card } from "./Card";
import { getResourceUrl } from "@/utils/urlUtils";

export function Aluno() {
    const navigation = useNavigation<NavigationProp<RootStackParamList>>();
    const [aluno, setAluno] = useState<InfoAlunoType | null>(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchAluno = async () => {
            try {
                const response = await getInfoAluno();
                setAluno(response.data);
            } catch (e) {
                // Alert.alert("Erro", "Não foi possível carregar as informações do aluno.");
            } finally {
                setLoading(false);
            }
        };
        fetchAluno();
    }, []);

    const handleLogout = async () => {
        try {
            await logout();
            await AsyncStorage.removeItem("token");
        } catch (e) {
            // Alert.alert("Erro", "Erro ao efetuar logout.");
        } finally {
            navigation.navigate("login");
        }
    };

    if (loading) {
        return (
            <View style={{ flex: 1, justifyContent: "center", alignItems: "center" }}>
                <Text>Carregando informações...</Text>
            </View>
        );
    }

    return (
        <View>
            <Card title='Informações do aluno'>
                <View style={styles.profile}>
                    <Image
                        style={styles.profileImage}
                        source={
                            aluno?.foto
                                ? { uri: getResourceUrl(aluno.foto) }
                                : require(".././assets/images/profile.jpg")
                        }
                    />
                </View>
                <Text style={{ textAlign: "center", fontWeight: "bold", fontSize: 18, marginBottom: 5 }}>
                    {aluno?.nome || "N/A"}
                </Text>
                <Text style={{ textAlign: "center", marginBottom: 10 }}>
                    <Text>{aluno?.email || "N/A"}</Text>
                </Text>
                <Text style={{ textAlign: "center", marginBottom: 5 }}>
                    <Text style={{ fontWeight: "bold" }}>Matricula: </Text>
                    <Text>{aluno?.matricula || "N/A"}</Text>
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
    profileImage: { width: 150, height: 150, borderRadius: 75 },
});
