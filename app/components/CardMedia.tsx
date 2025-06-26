import { getMedia } from "@/api/aluno";
import { MediaType } from "@/types/aluno";
import { formatDecimal } from "@/utils/formatUtils";
import { MaterialCommunityIcons } from "@expo/vector-icons";
import { useEffect, useState } from "react";
import { StyleSheet, Text, View } from "react-native";

type Props = {
    disciplina: number;
};

export function MediaCard({ disciplina }: Props) {

    const [media, setMedia] = useState<number>(0);

    useEffect(() => {
        const fetchMedia = async () => {
            try {
                const response = await getMedia(disciplina);
                setMedia(response.data.media);
            } catch (e) {
                // Alert.alert("Erro", "Não foi possível carregar a média.");
            }
        }
        
        fetchMedia();
     }, [disciplina]);
    return (
        <View style={styles.mediaContainer}>
            <MaterialCommunityIcons name="star-circle" size={32} color="#FFD700" style={{ marginRight: 8 }} />
            <Text style={styles.mediaText}>
                Sua média nesta disciplina: <Text style={styles.mediaValue}>{formatDecimal(media)}</Text>
            </Text>
        </View>
    );
}

const styles = StyleSheet.create({
    mediaContainer: {
        flexDirection: "row",
        alignItems: "center",
        justifyContent: "center",
        backgroundColor: "#fffbe6",
        borderRadius: 8,
        margin: 12,
        padding: 12,
        borderWidth: 1,
        borderColor: "#ffe066",
        elevation: 2,
    },
    mediaText: {
        fontSize: 16,
        color: "#444",
    },
    mediaValue: {
        fontWeight: "bold",
        color: "#007BFF",
        fontSize: 18,
    },
});