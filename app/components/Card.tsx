import { StyleSheet, Text, View } from "react-native";
import { GestureHandlerRootView } from "react-native-gesture-handler";

type CardProps = {
    title: string;
    children?: React.ReactNode;
};

export function Card({ title, children }: CardProps) {
    return (
        <View style={styles.card}>
            <View>
                <Text style={styles.cardTitle}>{title}</Text>
                <View style={styles.cardLine} />
            </View>

            <GestureHandlerRootView style={styles.cardContent}>{children}</GestureHandlerRootView>
        </View>
    );
}

const styles = StyleSheet.create({
    card: {
        backgroundColor: "#fff",
        padding: 16,
        margin: 16,
        elevation: 3,
        borderRadius: 8,
        borderTopWidth: 4,
        borderTopColor: "#007BFF",
    },
    cardTitle: {
        fontWeight: "500",
        textTransform: "uppercase",
        fontSize: 12,
    },
    cardContent: {},
    cardLine: {
        height: 1,
        backgroundColor: "#ccc",
        marginVertical: 16,
        marginLeft: -16,
        marginRight: -16,
    },
});
