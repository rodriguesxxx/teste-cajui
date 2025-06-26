import { Aluno } from "@/components/Aluno";
import { Disciplinas } from "@/components/Disciplinas";
import { StyleSheet } from "react-native";

import { SafeAreaView } from "react-native-safe-area-context";

export default function HomeScreen() {
    return (
        <SafeAreaView>
            <Aluno />
            <Disciplinas />
        </SafeAreaView>
    );
}

const styles = StyleSheet.create({});
