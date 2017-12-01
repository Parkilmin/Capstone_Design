import java.io.*;
import java.util.HashMap;
import java.util.Stack;

public class decision {
	public static void main(String[] args) throws FileNotFoundException
    {
		HashMap<String, Integer> map = new HashMap<String, Integer>();
		map.put("소고기", 1);
		map.put("초유", 1);
		map.put("오리고기", 1);
		map.put("동물성_지방_및_오일", 1);
		map.put("동물성_지방", 1);
		map.put("싱싱한_고기", 1);
		map.put("양고기", 1);
		map.put("간", 1);
		map.put("돼지고기", 1);
		map.put("토끼고기", 1);
		map.put("계란", 1);
		map.put("양", 1);
		map.put("천엽", 1);
		map.put("칠면조고기", 1);
		map.put("사슴고기", 1);
		map.put("치즈파우더", 0);
		map.put("골분", 0);
		map.put("가수분해물", 0);
		map.put("가수분해_단백질", 0);
		map.put("가금류", 0);
		map.put("가금류_지방", 0);
		map.put("보리", 0);
		map.put("귀리", 0);
		map.put("흰_쌀", 0);
		map.put("사탕수수", 0);
		map.put("스펠트밀", 0);
		map.put("스펠트밀_단백질", 0);
		map.put("소금", -1);
		map.put("유제품", -1);
		map.put("밀", -1);
		map.put("완두콩_단백질", -1);
		map.put("감자_단백질", -1);
		map.put("식물성_단백질_추출물", -1);
		map.put("황산구리", -1);
		map.put("아_셀렌_산_나트륨", -1);
		map.put("인공_방부제_및_산화_방지제", -1);
		map.put("카라기난", -1);
		map.put("EC_허용_첨가물", -1);
		map.put("인산", -1);
		map.put("당근", 0);
		map.put("인산칼슘", 1);
		map.put("옥수수", -1);
		map.put("대두박", -1);
		map.put("소맥", 0);
		map.put("옥글루텐", -1);
		map.put("정제계유", -1);
		map.put("계육분", -1);
		map.put("비타민", 1);
		map.put("미네랄", 1);
		map.put("닭고기", 1);
		map.put("고구마", 1);
		map.put("콩", -1);
		map.put("감자", 0);
		map.put("닭기름", -1);
		map.put("천연향미제", -1);
		map.put("연어", 1);
		map.put("올리고당", 1);
		map.put("곡물", -1);
		map.put("밀글루텐", -1);
		map.put("나무열매", 0);
		map.put("비특이성_면역증강제", -1);
		map.put("비타민_및_미네랄", 1);
		map.put("유기농_식물성_단백질", -1);
		map.put("유기농_쌀", -1);
		map.put("동물성_단백질_프리믹스", -1);
		map.put("닭연골", 0);
		map.put("가수분해_닭고기", 1);
		map.put("알긴산 올리고당", 1);
		map.put("타우린", 1);
		map.put("유산균", 0);
		map.put("시금치", 0);
		map.put("미나리", 0);
		map.put("염화콜린", 0);
		map.put("블루베리", 0);
		map.put("비오틴", 0);
		map.put("판톤텐산", 0);
		map.put("엽산", 0);
		map.put("니코틴산", 0);
		map.put("철", 0);
		map.put("구리", 0);
		map.put("아연", 0);
		map.put("셀레늄", 0);
		map.put("망간", 0);
		map.put("코발트", 0);
		map.put("요오드", 0);
		map.put("천일염", -1);
		map.put("곡류", -1);
		map.put("강피류", 0);
		map.put("박류", 0);
		map.put("가금부산물건조분", 0);
		map.put("수지박", 0);
		map.put("사탕무박", 0);
		map.put("효모배양물", 0);
		map.put("석회석분말", 0);
		map.put("레시틴", 0);
		map.put("벤토나이트", 0);
		map.put("염화칼륨", 0);
		map.put("소르빈산칼륨", 0);
		map.put("유카추출물", 0);
		map.put("생선", 1);
		map.put("쌀", -1);
		map.put("비트펄프", 0);
		map.put("토마토", 1);
		map.put("파슬리", 0);
		map.put("브로콜리", 0);
		map.put("콘드로이친(상어연골추출분말)", 0);
		map.put("글루코사민", 0);	
		map.put("판토텐산_칼슘", 0);		
		map.put("육류", 0);
		map.put("가금육", 1);
		map.put("육류", 0);
		map.put("곡물단백질", 0);
		map.put("글리세롤", 0);
		map.put("육류", 0);
		map.put("야채", 0);
		map.put("식물성유지", 0);
		map.put("보존재", 0);
		map.put("천연 착향료", 0);
		map.put("식용색소", 0);
		map.put("마리골드", 0);
		map.put("황산화제", 0);
		map.put("뼈를_발라낸_칠면조", 1);
		map.put("통건조란", 0);
		map.put("완두콩", 1);
		map.put("완두분", 0);
		map.put("감자가루", 0);
		map.put("천연_맛", 0);
		map.put("아마인", 0);
		map.put("사과", 0);
		map.put("카놀라유", 0);
		map.put("뼈를_발라낸_연어", 1);
		map.put("뼈를_발라낸_오리", 1);
		map.put("야자유", 0);
		map.put("탄산_슘", 0);
		map.put("제2인산칼슘", 0);
		map.put("알파파", 0);
		map.put("호박", 0);
		map.put("바나나", 0);
		map.put("크랜베리", 1);
		map.put("블랙베리", 0);
		map.put("석류", 0);
		map.put("파파야", 0);
		map.put("렌즈콩", 0);
		map.put("말린_치커리_뿌리", 1);
		map.put("삼인산나트륨", 0);
		map.put("염화나트륨", 0);
		map.put("이노시톨", 0);
		map.put("L-아스크로빌-2-폴리포스페이트", 0);
		map.put("d-판토텐산_칼슘", 0);
		map.put("질산티아민", 0);
		map.put("베타카로틴", 0);
		map.put("리보플라빈", 0);
		map.put("염산_피리독신", 0);
		map.put("아연_메티오닌_복합체", 0);
		map.put("아연_단백질_화합물", 0);
		map.put("철_단백질_화합물", 0);
		map.put("구리_단백질_화합물", 0);
		map.put("신화아연", 0);
		map.put("망간_단백질_화합물", 0);
		map.put("황산_제_1철", 0);
		map.put("요오드칼슘", 0);
		map.put("산화방간", 0);
		map.put("셀레늄_효모", 0);
		map.put("DL-메티오닌", 0);
		map.put("L-리진", 0);
		map.put("해초추출물", 1);
		map.put("말린_락토바실러스_아시도필러스_발효제품", 0);
		map.put("말린_엔테로코커스_패시임_발효제품", 0);
		map.put("박하", 0);
		map.put("녹차_추출물", 1);
		map.put("L-카르니틴", 0);
		map.put("말린_로즈메리", 1);
		map.put("모질개선제", 0);
		map.put("감자분말", 0);
		map.put("당근분말", 1);
		map.put("닭고기분말", 1);
		map.put("식이섬유", 0);
		map.put("알파콘", 0);
		map.put("천연유화제", 0);
		map.put("칼슘보강제", 0);
		map.put("치킨오일", 1);
		map.put("천연향균제", 0);
		map.put("프락토올리고당", 0);
		map.put("콘드로이친", 0);
		map.put("복합아미노산", 0);
		map.put("레반섬유소", 0);
		
		
		
		
		
		
		
		
		BufferedReader Ingredient = new BufferedReader(new FileReader("ingredient.txt"));
		String line;

        Stack<Integer> scorestack = new Stack<Integer>();

		try {
			//파일에 있는 모든 사료 조사
			while ((line = Ingredient.readLine()) != null) {
            	int i = 0; //원료명 순서 지정용
                int grade = 0; //원료명에 따른 +1,-1,0값 저장변수
                float foodscore = 0; //사료 점수
                float total = 0;  //원료명 개수에 대한 점수
            	
                //";"을 기준으로 성분을 나눠 ingredient배열에 저장
            	String[] ingredient = line.split(";");
            	
            	//하나의 사료 점수 계산 : 스택에 원료별 + - 0 push 후 pop하면서 곱한값 더해주기
            	//STACK : push part (원료를 순서대로 stack에 삽입)
                while(true) {
                	i++;
                	System.out.print(ingredient[i]+"  ");
                	if(ingredient[i].equals(".")==true) {
                		System.out.println();
                		i=1; //i=0은 사료명이기 때문에 계산에 사용되지 않아 1부터 시작
                		break;
                		}
                	if(map.get(ingredient[i]).equals(null))
                		System.out.println(i);
                	//원료명에 따라 HashMap에서  +1,-1,0값을 STACK에 삽입한다.
                	scorestack.push(map.get(ingredient[i]));
                	}
                //STACK : pop part (stack의 원료를 pop하면서 가중치에 원료 성분에 따른 +,-,0을 곱해준다)
                while(!scorestack.isEmpty()) {
                	grade = (int)scorestack.pop();
                    foodscore += (i*i)*grade;
                    total += i*i;
                	System.out.println("i="+i+"\t score="+grade*i*i+"\t total="+foodscore);
                    i++;
                    }
                System.out.println("score =" + foodscore);
                System.out.println("total =" + total);
                System.out.println("Grade = " + (foodscore/total)*100);
                }
			} 
		catch (FileNotFoundException e) {
			e.printStackTrace();
			}
		
        catch (IOException e) {
        	e.printStackTrace();
        	}
		finally {
			if(Ingredient != null) try {Ingredient.close();
            } 
            catch (IOException e) {
            	
            }
        }
    }
	}
